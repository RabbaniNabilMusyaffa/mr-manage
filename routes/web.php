<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

//Auth
Route::get('/register', [AuthController::class, 'registerView'])->name('register-view');
Route::get('/', [AuthController::class, 'index'])->name('login-view');
Route::post('/loginAuth', [AuthController::class, 'authenticate'])->name('login-auth');
Route::post('/regist', [AuthController::class, 'register'])->name('register-auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {

    $controller_path = 'App\Http\Controllers';

    // Main Page Route
    Route::get('/dashboard', $controller_path . '\dashboard\Analytics@index')->name('dashboard-analytics');

    // pages
    Route::get('/pages/account-settings-account', [AuthController::class, 'profile'])->name('profile');
    Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('profile-history');
    Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
    Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

    // Authentication
    Route::get('/auth/login-basic', $controller_path . '\authentications\LoginBasic@index')->name('auth-login-basic');
    Route::get('/auth/register-basic', $controller_path . '\authentications\RegisterBasic@index')->name('auth-register-basic');
    Route::get('/auth/forgot-password-basic', $controller_path . '\authentications\ForgotPasswordBasic@index')->name('auth-reset-password-basic');

    // Task Management part
    Route::get('/tambahTask', [TaskController::class, 'create'])->name('tambah-task');
    Route::post('/storeTask', [TaskController::class, 'store'])->name('store-task');
    Route::get('/detailTask/{id}', [TaskController::class, 'detail'])->name('task-detail');
    Route::get('/editTask/{id}', [TaskController::class, 'edit'])->name('task-edit');
    Route::post('/updateTask/{id}', [TaskController::class, 'update'])->name('task-update');
    Route::delete('/deleteTask/{id}', [TaskController::class, 'delete'])->name('task-delete');

    // Tabel task
    Route::get('/taskList', [TaskController::class, 'index'])->name('task-list');
});
