<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\modalController;
use App\Http\Controllers\tableController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\InsertDataController;
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
})->middleware('alreadyLoggedIn');
// Route::get('/login',[GoogleAuthController::class,'register']);
Route::get('/register',[GoogleAuthController::class,'register'])->middleware('alreadyLoggedIn');
Route::post('/registration',[GoogleAuthController::class,'registration'])->name('registration');
Route::post('/login-user',[GoogleAuthController::class,'loginUser'])->name('login-user');
Route::get('auth/google',[GoogleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[GoogleAuthController::class,'callbackGoogle']);
Route::get('/logout',[GoogleAuthController::class,'logout']);
Route::post('/insert',[InsertDataController::class,'insert']);
Route::get('/conf-modal',[modalController::class,'confModal']);
Route::get('/dashboard', function () {
    $googleAuthController = new GoogleAuthController();
    $data = $googleAuthController->dashboard();
    $tableData = $googleAuthController->tableData();
    
    return view('dashboard', compact('data', 'tableData'));
})->middleware('authCheck')->name('dashboard');