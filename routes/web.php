<?php

use App\Livewire\User\Dashboard;
use App\Livewire\User\Register;
use App\Livewire\User\Login;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AdminLogin;
use App\Livewire\Admin\ApproveUser;
use App\Livewire\Admin\Documents;
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\AccessLog;
use App\Livewire\Admin\TrackingLog;
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


Route::middleware(['web'])->group(function () {
    Route::get('user/register', Register::class)->name('user.register');
    Route::get('user/login', Login::class)->name('user.login');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', Dashboard::class)->name('user.dashboard');
});
//admin routes

Route::middleware(['guest:admin'])->group(function () {
    Route::get('/admin/login', AdminLogin::class)->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.admin-dashboard');

    Route::get('/admin/users', ApproveUser::class)->name('admin.users');
    Route::get('admin/documents', Documents::class)->name('documents');
    Route::get('admin/access-log', AccessLog::class)->name('AccessLog');
    Route::get('admin/tracking-log', TrackingLog::class)->name('TrackingLog');
    Route::get('admin/user-management', UserManagement::class)->name('userManagement');
});
