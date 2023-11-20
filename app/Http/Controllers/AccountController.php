<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\CreatePostService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public $createPostService;

    public function __construct(CreatePostService $createPostService)
    {
        $this->createPostService = $createPostService;
        set_time_limit(8000000);
    }

    public function index()
    { 
        $response = $this->createPostService->InitilizeData();
        $instapages = $response['linkedin'];
        $all_pages = $response['facebook'];
        $all_pages_for_insta = [];
      
        return view('user.socialPlatform', compact('instapages', 'all_pages', 'all_pages_for_insta'));
        
    }

    public function store(Request $request)
    {
        Account::create([
            'user_id' => auth()->id(),
            'name' => $request->name ?? '',
        ]);
        return back()->with('success', 'Account Created Successfully.');
    }

    public function delete($id)
    {
        $acc = Account::find($id);
        $accname= $acc->name;
        $acc->delete();
        return back()->with('success', 'Account Deleted Successfully.')->with('accname', $accname);


        // Redirect or return a response as needed
    }

    public function change_account($id)
    {
        auth()->user()->update([
            'account_id' => decrypt($id)
        ]);
        return back()->with('success', 'Account Updated Successfully.');
    }

    public function update_account_name(Request $request)
    {
        Account::find($request->account_id)->update([
            'name' => $request->account_name,
        ]);
        return true;
    }

    public function refresh_accounts(Request $request)
    {
       
        $accounts = \Auth::user()->accountList;
       
        return view('user.component.ajax.account', compact('accounts'));
    }
}
