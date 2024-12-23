<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Models\Employee;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth');
Route::get('/boshqaruv', [AuthController::class, 'login'])->name('boshqaruv');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/home', [MainController::class, 'home'])->name('home');
    Route::get('/self-partners', [MainController::class, 'selfPartners'])->name('self-partners');
    Route::get('/partners-tree', [MainController::class, 'partnersTree'])->name('partners-tree');
    Route::get('/about-me', [MainController::class, 'aboutMe'])->name('about-me');
});
