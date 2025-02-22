<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    //استرجاع البيانات
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('tasks'));
    }

    // لاضافة المدخل الى الداتا البيز وتحديث الصفحة
    public function taskCreate()
    {
        $task_name = $_POST['name'];
        DB::table('tasks')->insert(['name' => $task_name]);
        return redirect()->back();
    }

    // زر الحذف
    public function taskDelete($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect()->back();
    }

    // زر التعديل
    public function taskEdit($id)
    {
        $task = DB::table('tasks')->where('id', '=', $id)->first();
        $tasks = DB::table('tasks')->get();
        return view('tasks', compact('task', 'tasks'));
    }

    public function taskUpdate(){
        $id = $_POST['id'];
         DB::table('tasks')->where('id' , '=' ,$id)->update(['name' => $_POST['name']]);
        return redirect('tasks');
    }
}
