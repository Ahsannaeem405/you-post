<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;



use Illuminate\Http\Request;

class AdminControoler extends Controller
{
    //
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    public function dashbaord()
    {
       
        // $users = $this->user->whereRole('user')->OrderBy('id', 'desc')->get();
       
        return view('admin.admin-dashboard.dashboard');

    }

    public function show_users()
    {
       
        $users = $this->user->whereRole('user')->withCount('accountList')->OrderBy('id', 'desc')->get();
            //  dd($users);
        return view('admin.admin-dashboard.index',compact('users'));

    }


    public function addUser(AddUserRequest $request)
    {
        
         $validator = Validator::make($request->all(), [
            'password' => 'required|min:8|confirmed',
        ]);


        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        return redirect('/admin/dashbaord')->with('success', 'User Added Successfully!');

    }

    public function deleteUser($id)
    {
        
        $this->user->findOrFail(decrypt($id))->delete();
        return redirect('/admin/dashbaord')->with('success', 'User Deleted Successfully!');

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
    
        $accounts = $user->accountList()->withCount('posts')->get();; // Assuming you have a relationship named 'accounts'
        $platformLogos = [
            'Facebook' => 'fbposticon.png',
            'Twitter' => 'twitterpost.png',
            'Linkedin' => 'linkpost.png',
            'Instagram' => 'instagram.png',           
        ];
    
        return view('admin.ajax.get-accounts', compact('accounts','platformLogos'));
       

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

    public function updateUser(Request $request)
{
   
    $request->validate([
        'old_password' => 'required',
        'password' => 'required|min:8|confirmed',
        'edit_email' => 'required|email|unique:users,email',
    ]);

    $user =$this->user::find($request->input('user_id'));

    if (!Hash::check($request->input('old_password'), $user->password)) {
        return response()->json(['error' => 'The old password does not match.'], 401);
    }

    $user->name = $request->input('edit_name'); 
    $user->email = $request->input('edit_email'); 

    $user->password = bcrypt($request->input('password'));
    $user->save();

    return response()->json(['message' => 'Record updated successfully']);
}
}
