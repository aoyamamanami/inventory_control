<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Http\Controllers\AdminController;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('categories.index')->with(['products' => $category->getByCategory()]);
    }
}
