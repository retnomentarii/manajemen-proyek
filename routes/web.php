<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisProjectController;
use App\Http\Controllers\MemberProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Middleware\PermissionMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});
Route::middleware(['guest'])->group(function () {
    Route::get('/auth/login', [AuthController::class, 'index'])->name('auth.login');
    Route::post('/auth/login', [AuthController::class, 'login']);
});

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::middleware(['auth', 'permissions:client'])->group(function () {
    Route::get('dashboard',  [DashboardController::class, 'index'])->name('dashboard');

    Route::get('admin', [AdminController::class, 'index'])->name('members.dashboard');
    Route::resource('members', AdminController::class);
    Route::post('admin/member/{id}/update', [AdminController::class, 'update'])->name('members.update.single');

    Route::resource('projects', ProjectController::class);
    Route::post('admin/project/{id}/update', [ProjectController::class, 'update'])->name('project.update.single');

    Route::resource('jenisProject', JenisProjectController::class);
    Route::post('admin/jenisProject/{id}/update', [JenisProjectController::class, 'update'])->name('jenisProject.update.single');

    Route::resource('admin/client', ClientController::class);
    Route::post('admin/client/{id}/update', [ClientController::class, 'update'])->name('client.update.single');

});


Route::middleware(['auth', 'permissions:karyawan'])->group(function () {
    Route::get('dashboard',  [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::post('admin/project/{id}/update', [ProjectController::class, 'update'])->name('project.update.single');

    Route::resource('admin/client', ClientController::class);
    Route::post('admin/client/{id}/update', [ClientController::class, 'update'])->name('client.update.single');

});
Route::resource('/profile/users', ProfileController::class)->names([
    'index' => 'profile.index',
    'create' => 'profile.create',
    'store' => 'profile.store',
    'show' => 'profile.show',
    'edit' => 'profile.edit',
    'update' => 'profile.update',
    'destroy' => 'profile.destroy',]);
    Route::put('/profile/{id}/update-email-password', [ProfileController::class, 'updateEmailPassword'])->name('profile.updateEmailPassword');
