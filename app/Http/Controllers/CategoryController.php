<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('categories.index')->wirh(['posts' => $category->getByCategory()]);
    }
}
