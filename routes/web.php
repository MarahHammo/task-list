<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

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

Route::get('tasks', function(){
    return view('tasks');
});

Route::post('create', function(){
    $task_name = $_POST['name'];
    DB::table('tasks')->insert(['name'=> $task_name]);
    return view('tasks');
});
