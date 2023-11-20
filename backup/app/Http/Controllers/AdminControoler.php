<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\AddUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


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
       
        $users = $this->user->whereRole('user')->OrderBy('id', 'desc')->get();
       
        return view('admin.admin-dashboard.index',compact('users'));

    }

    public function addUser(AddUserRequest $request)
    {
        
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
