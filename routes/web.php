<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// //////////////////////// social login////////////////////////

Route::get('auth/google', [LoginController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->name('facebook.callback');

// ///////////////////////social login/////////////////////////

Route::group(['middleware' => ['auth']], function () {

    Route::get('index', [UserController::class, 'index']);
    //Route::get('select_page', [UserController::class, 'select_page']);

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
    Route::get('post_delete/{id}', [UserController::class, 'post_delete']);
    Route::post('update_post', [UserController::class, 'update_post']);
    Route::get('edit_post/{id}', [UserController::class, 'edit_post']);

    Route::get('get_event_detail', [UserController::class, 'get_event_detail']);
    //update account platforms
    Route::get('update_user_platforms', [UserController::class, 'update_user_platforms']);

    //connect to facebook
    Route::get('connect_to_facebook', [UserController::class, 'connect_to_facebook']);
    Route::get('connect_facebook/calback', [UserController::class, 'connect_facebook_calback']);
//connect to instagram
    Route::get('connect_to_instagram', [UserController::class, 'connect_to_instagram']);
    Route::get('connect_instagram/calback', [UserController::class, 'connect_instagram_calback']);
//connect to linkedin
    Route::get('connect_to_linkedin', [UserController::class, 'connect_to_linkedin']);
    Route::get('connect_linkedin/calback', [UserController::class, 'connect_linkedin_calback']);
//connect to twitter
    Route::get('connect_to_twitter', [UserController::class, 'connect_to_twitter']);
    Route::get('connect_to_twitter/calback', [UserController::class, 'connect_twitter_calback']);


    Route::get('get-facebook-likes', [UserController::class, 'get_facebook_likes']);

    //Multiple accounts
    Route::post('store_acount', [\App\Http\Controllers\AccountController::class, 'store']);
    Route::get('change_acount/{id}', [\App\Http\Controllers\AccountController::class, 'change_account']);

    //preferred text gpt
    Route::post('preferred-text', [\App\Http\Controllers\GptController::class, 'PreferredText']);
});
Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});
