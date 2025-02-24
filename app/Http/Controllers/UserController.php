<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\USer;


class UserController extends Controller
{
    //استرجاع البيانات
    public function index()
    {
        // $users = DB::table('users')->get();

        //using user model
        $users = User::all();

        return view('users', compact('users'));
    }

    // لاضافة المدخل الى الداتا البيز وتحديث الصفحة
    public function userCreate()
    {
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];

        // DB::table('users')->insert([
        //     'name' => $user_name,
        //     'email' => $user_email,
        //     'password' => $user_password
        // ]);

        //using user model
        $user = new User();
        $user->name  = $user_name;
        $user->email  = $user_email;
        $user->password  = $user_password;
        $user->save();
        return redirect()->back();
    }

    // زر الحذف
    public function userDelete($id)
    {
        // DB::table('users')->where('id', $id)->delete();

        //using user model
        $user = User::find($id);
        $user->delete();

        return redirect()->back();
    }

    // زر التعديل
    public function userEdit($id)
    {
        // $user = DB::table('users')->where('id', '=', $id)->first();
        // $users = DB::table('users')->get();

        //using user model
        $user = user::find($id);
        $users = user::all();
        return view('users', compact('user', 'users'));
    }

    public function userUpdate()
    {
        $id = $_POST['id'];

        // DB::table('users')->where('id', '=', $id)->update([
        //     'name' => $_POST['name'],
        //     'email' => $_POST['email'],
        //     'password' => $_POST['password']
        // ]);

        //using user model
        $user = user::find($id);
        $user_name = $_POST['name'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];
        $user->name  = $user_name;
        $user->email  = $user_email;
        $user->password  = $user_password;
        $user->save();

        return redirect('users');
    }
}
