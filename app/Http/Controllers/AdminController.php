<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\AdminRequest;
//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のAdminクラスをインポートしている。

class AdminController extends Controller
{
    public function index(Admin $product)//インポートしたAdminをインスタンス化して$productとして使用。
    {
        return view('admins/index')->with(['products' => $product->getPaginateByLimit()]);
        //blade内で使う変数'admins'と設定
        //admins/indexはviewsフォルダの中のadminsフォルダの中にあるindex.blade.phpを指す。
    }
    
    public function create()
    {
        return view('admins/create');
    }
    
    public function store(Admin $product, AdminRequest $request)
    {
        $input = $request['product'];
        $product->fill($input)->save();
        return redirect()->route('index');
    }
    
    
}