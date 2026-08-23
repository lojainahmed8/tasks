<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


route::get('/students', function ()
{
    $students = [
        ["id" => 1, "name" => "leena", "email" => "leena@gmail.com"],
        ["id" => 2, "name" => "salma", "email" => "salma@gmail.com"],
        ["id" => 3, "name" => "login", "email" => "login@gmail.com"],
        ["id" => 4, "name" => "mohammed", "email" => "mohammed@gmail.com"],
    ];

    return view('allStudents', compact("students"));
});

route::get('/student/{id}', function ($id)
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