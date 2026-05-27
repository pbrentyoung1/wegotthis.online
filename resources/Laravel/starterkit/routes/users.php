<?php

use App\Http\Controllers\Users\ContactsController;
use App\Http\Controllers\Users\PermissionController;
use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Users\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('users')->group(function () {
    Route::get('contacts', [ContactsController::class, 'index'])->name('users.contacts.index');
    Route::get('profile/{user}', [ProfileController::class, 'show'])->name('users.profile.show');
    Route::get('roles', [RoleController::class, 'index'])->name('users.roles.index');
    Route::get('roles/{role:slug}', [RoleController::class, 'show'])->name('users.roles.show');
    Route::get('permissions', [PermissionController::class, 'index'])->name('users.permissions.index');
});
