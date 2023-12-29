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
use Illuminate\Support\Str;
use Illuminate\Auth\Events\PasswordReset;


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

        return view('admin.admin-dashboard.dashboard', compact(
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
        return view('admin.admin-dashboard.index', compact('users'));

    }

    public function sendlink(Request $request)
    {

        $user = User::find($request->user_id);
        if ($user) {
            $token = Password::getRepository()->create($user);
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
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
                Auth::login($user);

            }
        );
        // Check the response and redirect accordingly
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('index')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    public function show_profile()
    {

        $record = User::find(auth()->user()->id);
        // dd($record);

        return view('admin.admin-dashboard.profile', compact('record'));

    }

    public function show_admins()
    {

        // $users = $this->user->whereRole('admin')->withCount('accountList')->OrderBy('id', 'desc')->get();
        $currentAdmin = Auth::user();

        $admins = $this->user
            ->whereRole('user')
            ->where('id', '!=', $currentAdmin->id)
            ->withCount('accountList')
            ->orderBy('id', 'desc')
            ->get();
        return view('admin.admin-dashboard.admins', compact('admins'));

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
            'is_verified' => true,
            'type' => $request->input('type'),
            'email_verified_at' => now(),

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

        return view('admin.ajax.get-accounts', compact('accounts', 'platformLogos'));


    }


    public function disable_user(Request $request)
    {

        $isChecked = filter_var($request->input('isChecked'), FILTER_VALIDATE_BOOLEAN);
        $recordId = $request->input('recordId');

        try {
            User::where('id', $recordId)->update(['disabled' => $isChecked]);
            $message = $isChecked ? 'User disabled successfully' : 'User enabled successfully';

        } catch (\Exception $e) {
        }
        $message = $isChecked ? 'User disabled successfully' : 'User enabled successfully';
        return response()->json(['message' => $message]);

    }

    public function getAccountPosts($id)
    {


        $account = Account::find($id);

        if (!$account) {
            return response()->json(['message' => 'Account not found'], 404);
        }

        $posts = $account->posts;


        return view('admin.ajax.get-posts', compact('posts', 'account'));


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
        $user = $this->user::find($request->input('user_id'));

        $request->validate([
            'password' => 'nullable|min:8|confirmed',
            'edit_email' => 'required|email|unique:users,email,' . $user->id,
        ]);
        $user->name = $request->input('edit_name');
        $user->email = $request->input('edit_email');
        if ($request->password) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return response()->json(['message' => 'Record updated successfully']);
    }
}
