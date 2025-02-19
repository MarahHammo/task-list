<?php

use Illuminate\Support\Facades\Route;

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

