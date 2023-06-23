<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Chart;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のAdminクラスをインポートしている。

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $categories = Category::all();
        $keyword = $request->input('keyword');
        $categoryID = $request->input('category');
        $category = Category::where('name', 'LIKE', "%{$keyword}%")->first();
        $query = Product::query();
        if(!empty($categoryID)) {
            $query->where('category_id', $categoryID);
        }
        if(!empty($keyword)) {
            $query->where(function ($q) use ($keyword, $category) {
                $q->where('product_code', 'LIKE', "%{$keyword}%")
                  ->orWhere('name', 'LIKE', "%{$keyword}%");
            if($category) {
                $q->orWhere('category_id', '=', $category->id);
                }
            });
        }
        $products = $query->with('category')->orderBy('product_code', 'ASC')->paginate(150);
        return view('admins.index', compact('products', 'keyword', 'categories'));
    }
    
    
    public function edit(Product $product)
    {
        $product->load('category');
        return view('admins/edit')->with('product', $product);
    }
    
    
    public function create(Category $category)
    {
        return view('admins/create')->with(['categories' => $category->get()]);
    }
    
    
    public function store(Product $product, ProductRequest $request)
    {
        // $validated = $request['product']->validated();
        // $product->fill($validated)->save();
        // return redirect()->route('index');
        $input = $request['product'];
        $newQuantity = $input['quantity'];
        $product->fill($input)->save();
        
        $chart = new Chart;
        $chart->product_id = $product->id;
        $chart->quantity = $newQuantity;
        $chart->change_date = now();
        $chart->save();
        
        return redirect()->route('index');
    }

    
    public function update(Request $request, Product $product)
    {
        $input = $request->input('product');
        $newQuantity = $input['quantity'];
        $product->fill($input)->save();
    
        $chart = new Chart;
        $chart->product_id = $product->id;
        $chart->quantity = $newQuantity;
        $chart->change_date = now();
        $chart->save();
    
        
        return redirect()->route('index');
    }
    
    
    public function delete(Product $product)
    {
        $product->delete();
        return redirect('/');
    }
    

    public function chart()
    {
        $products = Product::all();
        
        $chartData = [];
        foreach ($products as $product) {
            $chartData[$product->id] = [
            'name' => $product->name,
            'data' => Chart::where('product_id', $product->id)->orderBy('change_date')->get(['change_date', 'quantity'])
            ];
        }
        
        return view('admins.chart', compact('chartData'));
    }
    
    
    
}