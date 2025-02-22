<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //استرجاع البيانات
    public function index()
    {
        $users = DB::table('users')->get();
        return view('users', compact('users'));
    }

    // لاضافة المدخل الى الداتا البيز وتحديث الصفحة
    public function userCreate()
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        DB::table('users')->insert([
            'name' => $user_name,
            'email' => $user_email,
            'password' => $user_password
        ]);
        return redirect()->back();
    }

    // زر الحذف
    public function userDelete($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect()->back();
    }

    // زر التعديل
    public function userEdit($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        $users = DB::table('users')->get();
        return view('users', compact('user', 'users'));
    }

    public function userUpdate()
    {
        $id = $_POST['id'];
        DB::table('users')->where('id', '=', $id)->update([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        ]);
        return redirect('users');
    }
}
