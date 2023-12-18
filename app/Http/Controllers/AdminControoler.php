<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Post;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\ResetsPasswords;






use Illuminate\Http\Request;

class AdminControoler extends Controller
{
    use SendsPasswordResetEmails;

    //
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function dashbaord()
    {
      
        // $user = $this->user->whereRole('user')->OrderBy('id', 'desc')->get();
        $totalUsersCount = User::whereRole('user')->count();
        $totalDisabledUsersCount = User::whereRole('user')->where('disabled', true)->count();
        $totalEnabledUsersCount = User::whereRole('user')->where('disabled', false)->count();
        $totalPost = Post::all()->count();
        $totalPostPosted = Post::where('posted_at_moment', 'now')->count();
        $totalPostScheduled = Post::where('posted_at_moment', 'later')->count();
        $totalAc = User::where('role', 'user')->withCount('accountList')->get()->sum('account_list_count');
        $linkedInCount = Account::whereRaw('JSON_CONTAINS(platforms, \'["Linkedin"]\')')->count();
        $facebookCount = Account::whereRaw('JSON_CONTAINS(platforms, \'["Facebook"]\')')->count();
        $twitterCount = Account::whereRaw('JSON_CONTAINS(platforms, \'["Twitter"]\')')->count();
        $instagramCount = Account::whereRaw('JSON_CONTAINS(platforms, \'["Instagram"]\')')->count();
        $acWithoutPlateFormAttached = User::where('role', 'user')
        ->with(['accountList' => function ($query) {
            $query->whereRaw('platforms IS NULL OR JSON_LENGTH(platforms) = 0');
        }])
        ->get()
        ->sum(function ($user) {
            return $user->accountList->count();
        });  
      
        return view('admin.admin-dashboard.dashboard',compact(
            'totalUsersCount',
            'totalDisabledUsersCount',
            'totalEnabledUsersCount',
            'totalPost',
            'totalPostPosted',
            'totalPostScheduled',
            'totalAc',
            'linkedInCount',
            'facebookCount',
            'twitterCount',
            'instagramCount',
            'acWithoutPlateFormAttached'
        ));

    }

    public function show_users()
    {
       
        $users = $this->user->whereRole('user')->withCount('accountList')->OrderBy('id', 'desc')->get();
            //  dd($users);
        return view('admin.admin-dashboard.index',compact('users'));

    }

    public function sendlink($user_id)
       {       
            
           $user = User::find($user_id);
           if ($user) {
            // Generate a password reset token for the user
            $token = Password::getRepository()->create($user);

            // Send the password reset email to the user
            $user->sendPasswordResetNotification($token);

            return response()->json(['message' => 'Password reset link sent successfully.']);
        } else {
            return response()->json(['error' => 'User not found.'], 404);
        }
    

    }
     public function showResetForm($token)
    {
           
        return view('auth.passwords.reset', ['token' => $token]);
       

    }
    
    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ], [
            'token.required' => 'The token field is required.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
            'password.confirmed' => 'The password confirmation does not match.',
            'password.min' => 'The password must be at least 8 characters.',
        ]);
        // dd( $request->all());
        // You can customize this part based on your requirements
        $token = $request->token;

        // You can customize this part based on your requirements
        $response = $this->broker()->reset(
            $this->credentials($request),
            function ($admin, $password) use ($token) {
                $this->resetPassword($admin, $password, 'admin.password.reset', $token);
            }
        );

        // Check the response and redirect accordingly
        return $response == Password::PASSWORD_RESET
            ? $this->sendResetResponse($response)
            : $this->sendResetFailedResponse($request, $response);
    }
    
    public function show_profile()
    {
       
        $record = User::find(auth()->user()->id);
        // dd($record);

        return view('admin.admin-dashboard.profile',compact('record'));

    }
    public function show_admins()
    {
       
        // $users = $this->user->whereRole('admin')->withCount('accountList')->OrderBy('id', 'desc')->get();
        $currentAdmin = Auth::user();

        $admins = $this->user
        ->whereRole('admin')
        ->where('id', '!=', $currentAdmin->id)
        ->withCount('accountList')
        ->orderBy('id', 'desc')
        ->get();
        return view('admin.admin-dashboard.admins',compact('admins'));

    }


    public function addUser(AddUserRequest $request)
    {
        
        
         $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
        ]);

// dd( $request->all());
        $suer = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'role' => $request->input('role'),
            'is_verified' =>true,
            'type' => $request->input('type'),
        ]);
        $userType = ucfirst($request->input('type'));
        return redirect()->back()->with('message', "{$userType} Added Successfully!");


    }

    public function deleteUser($id)
    {
      
        $user = User::findOrFail(decrypt($id));
        $user->delete();
        return redirect()->route('admin.dashboard')->with('success', 'User Deleted Successfully!');

        // return redirect('/admin/dashbaord')->with('success', 'User Deleted Successfully!');

    }
    public function getUserdData($id)
    {
        
        $record = $this->user::find($id);
       return response()->json($record);
       

    }


    public function getUserAccounts($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
    
        // $accounts = $user->accountList()->withCount('posts')->get();; // Assuming you have a relationship named 'accounts'
        $accounts = $user->accountList()->with(['posts' => function ($query) {
            $query->where('posted_at_moment', '=', 'now')->orWhere('posted_at_moment', '=', 'later');
        }])->get();
        
        $platformLogos = [
            'Facebook' => 'fbposticon.png',
            'Twitter' => 'twitterpost.png',
            'Linkedin' => 'linkpost.png',
            'Instagram' => 'instagram.png',           
        ];
    
        return view('admin.ajax.get-accounts', compact('accounts','platformLogos'));
       

    }

   
    public function disable_user(Request $request)
    {
            
        $isChecked = filter_var($request->input('isChecked'), FILTER_VALIDATE_BOOLEAN);
        $recordId = $request->input('recordId');
       
        try {
            User::where('id', $recordId)->update(['disabled' => $isChecked]);
                $message = $isChecked ? 'User disabled successfully' : 'User enabled successfully';      

        } catch (\Exception $e) {
        }        $message = $isChecked ? 'User disabled successfully' : 'User enabled successfully';      
         return response()->json(['message' => $message]);       

    }
    public function getAccountPosts($id)
    {
        
       
        $account = Account::find($id);
       
        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }
    
        $posts = $account->posts; 
     
    
        return view('admin.ajax.get-posts', compact('posts','account'));
       

    }
    public function list_admins()
    { 
     
    
        return view('admin.admin-dashboard.newAdmin');
       

    }
    public function list_users()
    { 
     
    
        return view('admin.admin-dashboard.newUser');
       

    }

    public function updateUser(Request $request)
{
    $user =$this->user::find($request->input('user_id'));

    $request->validate([
        // 'old_password' => 'required',
        'password' => 'required|min:8|confirmed',
        'edit_email' => 'required|email|unique:users,email,' . $user->id,
    ]);


    // if (!Hash::check($request->input('old_password'), $user->password)) {
    //     return response()->json(['error' => 'The old password does not match.'], 401);
    // }

    $user->name = $request->input('edit_name'); 
    $user->email = $request->input('edit_email'); 

    $user->password = bcrypt($request->input('password'));
    $user->save();

    return response()->json(['message' => 'Record updated successfully']);
}
}
