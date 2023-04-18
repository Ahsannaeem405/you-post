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
Route::get('/cls', function() {
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






//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/', [UserController::class, 'home_page']);
    Route::get('index', [UserController::class, 'index']);
    Route::get('select_page', [UserController::class, 'select_page']);
    Route::post('set_page', [UserController::class, 'set_page']);
    Route::post('set_page_for_instagram', [UserController::class, 'set_page_for_instagram']);
    
    
    Route::post('create_post', [UserController::class, 'create_post']);
    Route::get('get_event_detail', [UserController::class, 'get_event_detail']);
    Route::get('update_user_platforms', [UserController::class, 'update_user_platforms']);

    Route::post('connect_to_facebook',  [UserController::class, 'connect_to_facebook']);
    Route::get('connect_facebook/calback',  [UserController::class, 'connect_facebook_calback']);


    Route::get('connect_to_instagram',  [UserController::class, 'connect_to_instagram']);
    Route::get('connect_instagram/calback',  [UserController::class, 'connect_instagram_calback']);
    
    
    Route::get('connect_to_linkedin',  [UserController::class, 'connect_to_linkedin']);
    Route::get('connect_linkedin/calback',  [UserController::class, 'connect_linkedin_calback']);
    
    
    Route::get('connect_to_twitter',  [UserController::class, 'connect_to_twitter']);
    Route::get('connect_to_twitter/calback',  [UserController::class, 'connect_twitter_calback']);
    
    // http://localhost:8000/connect_facebook/calback
});
Route::get('logout',function (){
    Auth::logout();
    return redirect('/login');
});
