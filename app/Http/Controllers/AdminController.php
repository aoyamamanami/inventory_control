<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Http\Requests\AdminRequest;
use App\Models\Category;
use Illuminate\Http\Request;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のAdminクラスをインポートしている。

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = Category::where('name', 'LIKE', "%{$keyword}%")->first();
        $query = Admin::query();
        if(!empty($keyword)){
            $query->where('id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%");
                
            if ($category) {
                $query->orWhere('category_id', '=', $category->id);
            }
        }
        $products = $query->with('category')->orderBy('updated_at', 'ASC')->paginate(150);
        return view('admins/index', compact('products','keyword'));
    
    
    // public function index(Admin $product)//インポートしたAdminをインスタンス化して$productとして使用。
    // {
        // return view('admins/index')->with(['products' => $product->getPaginateByLimit()]);
        //blade内で使う変数'admins'と設定
        //admins/indexはviewsフォルダの中のadminsフォルダの中にあるindex.blade.phpを指す。
     }
    
    public function edit(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = Category::where('name', 'LIKE', "%{$keyword}%")->first();
        $query = Admin::query();
        if(!empty($keyword)){
            $query->where('id', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%");
                
            if ($category) {
                $query->orWhere('category_id', '=', $category->id);
            }
        }
        $products = $query->with('category')->orderBy('updated_at', 'ASC')->paginate(150);
        return view('admins/edit', compact('products','keyword'));
    }
    
    public function create(Category $category)
    {
        return view('admins/create')->with(['categories' => $category->get()]);
    }
    
    public function store(Admin $product, AdminRequest $request)
    {
        $input = $request['product'];
        $product->fill($input)->save();
        return redirect()->route('index');
    }
    
}