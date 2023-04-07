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
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);

// ///////////////////////social login/////////////////////////






//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/', [UserController::class, 'home_page']);
    Route::get('index', [UserController::class, 'index']);
    Route::post('create_post', [UserController::class, 'create_post']);
    Route::get('get_event_detail', [UserController::class, 'get_event_detail']);
    Route::get('update_user_platforms', [UserController::class, 'update_user_platforms']);

});
Route::get('logout',function (){
    Auth::logout();
    return redirect('/login');
});
