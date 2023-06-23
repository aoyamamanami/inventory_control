<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use App\Http\Controllers\AdminController;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $cateories = Category::get();
        return view('admins.index')->with(['products' => $category->getByCategory(), 'categories' => $category]);
    }
    
}
