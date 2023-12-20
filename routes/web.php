<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GptController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\AdminControoler;
use App\Http\Controllers\OtpController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/cls', function () {
    $run = Artisan::call('optimize:clear');
    // $run = Artisan::call('config:clear');
    // $run = Artisan::call('cache:clear');
    // $run = Artisan::call('config:cache');
    // $run = Artisan::call('view:clear');
    Session::flush();
    return 'FINISHED';
});

Route::get('/', function () {
    return redirect('login');
});
Route::get('/seed', function () {
    $run = Artisan::call('db:seed');
    return 'Completed';
});

Auth::routes();

Route::get('/migratefresh/seed', function () {
    $run = Artisan::call('migrate:fresh --seed');
    return 'Completedd';
});
Route::get('/migrate', function () {
    $run = Artisan::call('migrate');
    return 'Completedd';
});

// //////////////////////// social login////////////////////////

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('facebook.callback');

// ///////////////////////social login/////////////////////////


Route::group(['middleware' => ['role'] ,'prefix' => 'admin'], function () {     

    Route::get('dashboard', [AdminControoler::class, 'dashbaord'])->name('admin.dashboard');
    Route::get('users', [AdminControoler::class, 'show_users'])->name('admin.showusers');
    Route::post('adduser', [AdminControoler::class, 'addUser'])->name('admin.user');
    Route::get('deleteuser/{user}', [AdminControoler::class, 'deleteUser'])->name('admin.delete');
    Route::get('get-user/{id}', [AdminControoler::class, 'getUserdData'])->name('admin.get-user');
    Route::get('get-accounts/{id}', [AdminControoler::class, 'getUserAccounts'])->name('admin.get-accounts');
    Route::get('get-posts/{id}', [AdminControoler::class, 'getAccountPosts'])->name('admin.get-posts');
    Route::post('disable_user', [AdminControoler::class, 'disable_user'])->name('disable-user');
    Route::get('admins', [AdminControoler::class, 'show_admins'])->name('admin.showAdmins');
    Route::get('addAdmin', [AdminControoler::class, 'list_admins'])->name('admin.addAdmin');
    Route::get('addUser', [AdminControoler::class, 'list_users'])->name('admin.addUser');
    Route::get('profile', [AdminControoler::class, 'show_profile'])->name('admin.profile');
    Route:: get('update-user/', [AdminControoler::class, 'updateUser']);

    Route::get('sendlink/{user_id}', [AdminControoler::class, 'sendlink'])->name('password.sendlink');
    Route::get('/reset-password/{token}', [AdminControoler::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AdminControoler::class, 'reset'])->name('password.update');

    

});


Route::get('privacy-policy', [UserController::class, 'privacyPolicy'])->name('privacy.policy');

Route::middleware(['auth'])->group(function () {
    Route::get('/otp-verify', [OtpController::class, 'showOtpForm'])->name('verification.notice');
    Route::post('/send-otp', [OtpController::class, 'resendVerificationEmail'])->name('verification.resend');
    Route::get('/verify-otp', [OtpController::class, 'verifyOtp'])->name('verification.verify');
    Route::get('/verify/{userId}/{token}', [OtpController::class, 'verifyEmail']);


});

Route::group(['middleware' => ['auth','disable','otp']], function () {
   

    Route::get('dashboard', [UserController::class, 'dashbaord'])->name('dashboard');
    Route::get('dashboard2', [UserController::class, 'dashbaord2']);
    Route::get('/show-email', function () {
        return view('show-email'); // Assuming your view is located at resources/views/emails/bugEmail.blade.php
    })->name('show.email');
    Route::get('get-updated-posts', [UserController::class, 'getUpdatedPosts'])->name('get.updated.posts');

    //account page
    Route::get('index', [AccountController::class,'index'])->name('index');
    Route::post('update-account-name', [AccountController::class,'update_account_name'])->name('update-account-name');
    Route::post('refresh-accounts', [AccountController::class,'refresh_accounts'])->name('refresh-accounts');
    Route::post('/account', [AccountController::class,'delete'])->name('account-delete');
    Route::post('/reportbug', [UserController::class,'report_bug'])->name('report-bug');
    Route::get('create-posts/{id}', [UserController::class, 'account_post'])->name('user.create-posts');

    Route::post('resheudle_post', [UserController::class,'reschedule_post'])->name('resheudle-post');

    //get instagram pages using ajax
    Route::get('get_page_for_instagram', [UserController::class, 'get_page_for_instagram']);

    //set LinkedIn page
    Route::post('set_page_for_linkedin', [UserController::class, 'set_page_for_linkedin']);
    //set instagram page
    Route::post('set_page_for_instagram', [UserController::class, 'set_page_for_instagram']);
    //set facebook page
    Route::post('set_page', [UserController::class, 'set_page']);


//post routes
    Route::post('create_post', [UserController::class, 'create_post']);

    Route::post('/save-image-video', [UserController::class, 'saveImageAndVideo']);

    Route::get('post_delete/{id}', [UserController::class, 'post_delete']);
    Route::post('update_post', [UserController::class, 'update_post']);
    Route::get('edit_post/{id}', [UserController::class, 'edit_post']);

    Route::get('get_event_detail', [UserController::class, 'get_event_detail']);
    Route::get('get_single_detail', [UserController::class, 'get_single_detail']);


    Route::get('get-events', [UserController::class, 'get_events']);
    Route::post('get-suggestion', [UserController::class, 'get_suggestoins']);

    //update account platforms
    Route::get('update_user_platforms', [UserController::class, 'update_user_platforms']);
    Route::get('update_user_platforms_accounts', [UserController::class, 'update_user_platforms_accounts']);
    Route::get('reconnect_user__accounts', [UserController::class, 'reconnect_user__accounts']);

    //connect to facebook
    Route::get('connect_to_facebook/{account?}', [UserController::class, 'connect_to_facebook']);
    Route::get('connect_facebook/calback', [UserController::class, 'connect_facebook_calback']);
//connect to instagram
    Route::get('connect_to_instagram/{account?}', [UserController::class, 'connect_to_instagram']);
    Route::get('connect_instagram/calback', [UserController::class, 'connect_instagram_calback']);
//connect to linkedin
    Route::get('connect_to_linkedin/{account?}', [UserController::class, 'connect_to_linkedin']);
    Route::get('connect_linkedin/calback', [UserController::class, 'connect_linkedin_calback']);
//connect to twitter
    Route::get('connect_twitter/{account?}', [UserController::class, 'connect_to_twitter']);
    Route::get('connect_to_twitter/calback', [UserController::class, 'connect_twitter_calback']);


    Route::get('get-facebook-likes', [UserController::class, 'get_facebook_likes']);


    //Multiple accounts
    Route::post('store_acount', [\App\Http\Controllers\AccountController::class, 'store'])->name('store-acount');
    Route::get('change_acount/{id}', [\App\Http\Controllers\AccountController::class, 'change_account']);

    //preferred text gpt
    Route::any('preferred-text', [\App\Http\Controllers\GptController::class, 'PreferredText']);
});

Route::get('preview-page',[\App\Http\Controllers\GptController::class,'previewPage']);
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});
