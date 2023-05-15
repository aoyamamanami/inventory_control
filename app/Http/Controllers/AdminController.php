<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のAdminクラスをインポートしている。

class AdminController extends Controller
{
    public function index(Admin $admin)//インポートしたAdminをインスタンス化して$adminとして使用。
    {
        return $admin->get();//$adminの中身を戻り値にする。
    }
}
