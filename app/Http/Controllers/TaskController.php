<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Task;

class TaskController extends Controller
{
    //استرجاع البيانات
    public function index()
    {
        // $tasks = DB::table('tasks')->get();

        //using task model
        $tasks = Task::all();

        return view('tasks', compact('tasks'));
    }

    // لاضافة المدخل الى الداتا البيز وتحديث الصفحة
    public function taskCreate()
    {
        $task_name = $_POST['name'];
        // DB::table('tasks')->insert(['name' => $task_name]);

        // using task model
        $task = new Task();
        $task->name  = $task_name;
        $task->save();

        return redirect()->back();
    }

    // زر الحذف
    public function taskDelete($id)
    {
        // DB::table('tasks')->where('id', $id)->delete();

        //using user model
        $task = Task::find($id);
        $task->delete();

        return redirect()->back();
    }

    // زر التعديل
    public function taskEdit($id)
    {
        // $task = DB::table('tasks')->where('id', '=', $id)->first();
        // $tasks = DB::table('tasks')->get();

        //using task model
        $task = Task::find($id);
        $tasks = Task::all();
        return view('tasks', compact('task', 'tasks'));
    }

    public function taskUpdate()
    {
        $id = $_POST['id'];
        //  DB::table('tasks')->where('id' , '=' ,$id)->update(['name' => $_POST['name']]);

        //using user model
        $task = task::find($id);
        $task->name  = $_POST['name'];
        $task->save();

        return redirect('tasks');
    }
}
