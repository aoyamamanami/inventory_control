<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Chart;
use App\Models\Remarks;
use App\Models\User;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{

    public function index(Request $request)
    {
        $user = auth()->user();
        $categories = Category::where('user_id', $user->id)->get();
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
        
        //ログインユーザーが登録した商品のみ表示
        // $user = auth()->user();
        $query->where('user_id', $user->id);
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
        $input['user_id'] = auth()->user()->id;
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
        
        //formがnullの場合、既存データで更新
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
        
        //chartに「更新された単価」を登録
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
        $user = auth()->user();
        $products = Product::where('user_id', $user->id)->get();
        
        $chartData = [];
        foreach ($products as $product) {
            $chartData[$product->id] = [
            'name' => $product->name,
            'data' => Chart::where('product_id', $product->id)->orderBy('change_date')->get(['change_date', 'quantity'])
            ];
        }
        
        return view('admins.chart', compact('chartData'));
    }
    
    //カテゴリーのCRD
    public function categoryEdit(Category $category)
    {
        $user = auth()->user();
        $categories = Category::where('user_id', $user->id)->get();
        return view('admins.categoryEdit', compact('categories'));
    }
    
    public function categoryCreate(Category $category)
    {
        return view('admins.categoryEdit');
    }
    
    public function categoryStore(Category $category, Request $request)
    {
        $input = $request['category'];
        $input['user_id'] = auth()->user()->id;
        $category->fill($input)->save();
        return redirect()->route('categoryEdit');
    }
    
    public function categoryDelete(Category $category)
    {
        $category->delete();
        return redirect()->route('categoryEdit');
    }
    
    //メモのCRUD
    public function remarks(Remarks $remark)
    {
        $user = auth()->user();
        $remarks = Remarks::where('user_id', $user->id)->get();
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
        $input['user_id'] = auth()->user()->id;
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
