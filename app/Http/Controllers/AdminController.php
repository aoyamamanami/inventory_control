<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Chart;
use App\Models\Remarks;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $input = $request['product'];
        $newQuantity = $input['quantity'] ?? $product->quantity;
        $existingData = Product::find($product->id);
        
        if(!is_null($input['unit_price'])) {
            $product->unit_price = $input['unit_price'];
        } else {
            $product->unit_price = $existingData->unit_price;
        }
        if(!is_null($input['quantity'])) {
            $product->quantity = $input['quantity'];
        } else {
            $product->quantity = $existingData->quantity;
        }
        
        $product->save();
    
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
    
    public function categoryEdit(Category $category)
    {
        $categories = Category::all();
        return view('admins.categoryEdit', compact('categories'));
    }
    
    public function categoryCreate(Category $category)
    {
        return view('admins.categoryEdit');
    }
    
    public function categoryStore(Category $category, Request $request)
    {
        $input = $request['category'];
        $category->fill($input)->save();
        return redirect()->route('categoryEdit');
    }
    
    public function categoryDelete(Category $category)
    {
        $category->delete();
        return redirect()->route('categoryEdit');
    }
    
    public function remarks(Remarks $remark)
    {
        $remarks = Remarks::all();
        return view('admins.remarks', compact('remarks'));
    }
    
    public function remarksEdit(Remarks $remark)
    {
        return view('admins.remarksEdit', compact('remark'));
    }
    
    public function remarksCreate()
    {
        return view('admins.remarksCreate');
    }
    
    public function remarksStore(Remarks $remark, Request $request)
    {
        $input = $request['remarks'];
        $remark->fill($input)->save();
        return redirect()->route('remarks');
    }
    
    public function remarksUpdate(Remarks $remark, Request $request)
    {
        $input = $request['remarks'];
        $remark->fill($input)->save();
        return redirect()->route('remarks');
    }
    
    public function remarksDelete(Remarks $remark)
    {
        $remark->delete();
        return redirect()->route('remarks');
    }
}
