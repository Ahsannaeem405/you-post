<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\GptController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

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

Route::group(['middleware' => ['auth']], function () {

    Route::get('dashboard', [UserController::class, 'dashbaord'])->name('dashboard');
    Route::get('dashboard2', [UserController::class, 'dashbaord2']);


    //account page
    Route::get('index', [AccountController::class,'index'])->name('index');
    Route::post('update-account-name', [AccountController::class,'update_account_name'])->name('update-account-name');
    Route::post('refresh-accounts', [AccountController::class,'refresh_accounts'])->name('refresh-accounts');
    Route::post('/account/{id}', [AccountController::class,'delete'])->name('account-delete');


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

    Route::get('/save-image-video', [UserController::class, 'saveImageAndVideo']);

    Route::get('post_delete/{id}', [UserController::class, 'post_delete']);
    Route::post('update_post', [UserController::class, 'update_post']);
    Route::get('edit_post/{id}', [UserController::class, 'edit_post']);

    Route::get('get_event_detail', [UserController::class, 'get_event_detail']);
    Route::get('get-events', [UserController::class, 'get_events']);
    //update account platforms
    Route::get('update_user_platforms', [UserController::class, 'update_user_platforms']);

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
