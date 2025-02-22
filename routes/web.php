<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

// هناك 3 طرق لتوجيه البيانات من المتحكم للواجهة
Route::get('/about', function () {
    $name = 'Marah';
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'sales',
    ];

//     return view('about')->with('name', $name);
//     return view('about',['name' => $name]);
    return view('about', compact('name' , 'departments'));
});

Route::post('/about', function () {
    $name = $_POST['name'];
    $departments = [
        '1' => 'Technical',
        '2' => 'Financial',
        '3' => 'sales',
    ];

    return view('about' , compact('name'));
});

//Tasks Routes
// لجلب البيانات من الداتابيز
Route::get('tasks', [TaskController::class , 'index']);

// لاضافة المدخل الى الداتا البيز وتحديث الصفحة
Route::post('taskCreate', [TaskController::class , 'taskCreate']);

// زر الحذف
Route::post('taskDelete/{id}' ,  [TaskController::class , 'taskDelete']);

// زر التعديل
Route::post('taskEdit/{id}' ,  [TaskController::class , 'taskEdit']);
Route::post('taskUpdate' ,  [TaskController::class , 'taskUpdate']);




Route::get('/app', function () {
    return view('layouts.app');
});




//Users Routes
Route::get('users', [UserController::class , 'index']);
Route::post('userCreate', [UserController::class , 'userCreate']);
Route::post('userDelete/{id}' ,  [UserController::class , 'userDelete']);
Route::post('userEdit/{id}' ,  [UserController::class , 'userEdit']);
Route::post('userUpdate' ,  [UserController::class , 'userUpdate']);
