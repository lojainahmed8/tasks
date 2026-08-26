<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/students', function ()
{
    $students = [
        ["id" => 1, "name" => "leena", "email" => "leena@gmail.com"],
        ["id" => 2, "name" => "salma", "email" => "salma@gmail.com"],
        ["id" => 3, "name" => "login", "email" => "login@gmail.com"],
        ["id" => 4, "name" => "mohammed", "email" => "mohammed@gmail.com"],
    ];

    return view('allStudents', compact("students"));
});

Route::get('/student/{id}', function ($id)
{
    $students = [
        ["id" => 1, "name" => "leena", "email" => "leena@gmail.com"],
        ["id" => 2, "name" => "salma", "email" => "salma@gmail.com"],
        ["id" => 3, "name" => "login", "email" => "login@gmail.com"],
        ["id" => 4, "name" => "mohammed", "email" => "mohammed@gmail.com"],
    ];

    $student = collect($students)->firstWhere('id', (int) $id);

    if (!$student) {
        abort(404, 'Student not found');
    }

    return view('student', compact('student'));
});


//==================== Auth ===============

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


//==================== Users ===============

Route::resource("users", UserController::class);


//==================== Categories, Products, Orders ===============

Route::resource("categories", CategoryController::class);
Route::resource("products", ProductController::class);
Route::resource("orders", OrderController::class)->except(['edit', 'update']);