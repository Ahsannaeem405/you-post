<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function store(Request $request)
    {
        Account::create([
           'user_id' => auth()->id(),
           'name' => $request->name,
        ]);
        return back()->with('success','Account Created Successfully.');
    }

    public function change_account($id){
        auth()->user()->update([
            'account_id' => decrypt($id)
        ]);
        return back()->with('success','Account Updated Successfully.');

    }
}
