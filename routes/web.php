<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('login');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/devices', function () {
    return view('devices');
});
Route::get('/kebijakan-dan-privasi', function () {
    return view('kebijakan');
});
Route::get('/checklink',[LoginController::class, 'loginApi'])->name('loginApi');
// Route::get('/control-panel', function () {
//     return view('cpanel');
// });
Route::get('/control-panel', function () {
    return view('cpanel');
});


Route::get('/tracking', function () {
    return view('tracking');
});

Route::fallback(function () {
    return view('notfound');
});