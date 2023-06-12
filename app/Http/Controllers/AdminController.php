<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のAdminクラスをインポートしている。

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $category = Category::where('name', 'LIKE', "%{$keyword}%")->first();
        $query = Product::query();
        if(!empty($keyword)){
            $query->where('product_code', 'LIKE', "%{$keyword}%")
                ->orWhere('name', 'LIKE', "%{$keyword}%");
                
            if ($category) {
                $query->orWhere('category_id', '=', $category->id);
            }
        $products = $query->with('category')->orderBy('product_code', 'ASC')->paginate(150);
        }
        $products = $query->with('category')->orderBy('product_code', 'ASC')->paginate(150);
        return view('admins/index', compact('products','keyword'));
    }
    
    // public function index(Admin $product)//インポートしたAdminをインスタンス化して$productとして使用。
    
    public function edit(Product $product)
    {
        // dd($product);
        $product->load('category');
        return view('admins/edit')->with('product', $product);
    }
    
    public function create(Category $category)//$categoryはCategoryのインスタンス
    {
        return view('admins/create')->with(['categories' => $category->get()]);
    }
    
    public function store(Product $product, ProductRequest $request)
    {
        // $validated = $request['product']->validated();
        // $product->fill($validated)->save();
        // return redirect()->route('index');
        $input = $request['product'];
        $product->fill($input)->save();
        return redirect()->route('index');
    }
    
    public function update(Request $request, Product $product)
    {
        $input = $request['product'];
        $product->fill($input)->save();
        return redirect()->route('index');
    }
    
    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/');
    }
    
}