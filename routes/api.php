<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');

// Route khusus untuk Super Admin
Route::get('/admin/dashboard', function () {
    return response()->json(['message' => 'Welcome, Super Admin!']);
})->middleware(['auth:sanctum', 'role:superadmin']); // ✅ Pastikan 'role:superadmin'

// Route khusus untuk Admin
Route::get('/manage-users', function () {
    return response()->json(['message' => 'User Management']);
})->middleware(['auth:sanctum', 'role:admin']); // ✅ Pastikan 'role:admin'
