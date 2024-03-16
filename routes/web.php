<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
 
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});
 
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/', 'EventController@index');
Route::get('/event/create', 'EventController@create');
Route::post('/event/store', 'EventController@store');
Route::get('/event/edit/{id}', 'EventController@edit');
Route::post('/event/update/{id}', 'EventController@update');
Route::get('/event/delete/{id}', 'EventController@destroy');
Route::get('/event/prev', 'EventController@prev');
Route::get('/event/next', 'EventController@next');