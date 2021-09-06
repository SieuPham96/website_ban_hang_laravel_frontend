<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index($slug, $categoryId){
        $categories = Category::where('parents_id', 0)->get();
        $categoriesLimit = Category::where('parents_id', 0)->take(3)->get();
        $products = Product::where('category_id', $categoryId)->paginate(12);
        return view('product.category.list', compact('categoriesLimit', 'products', 'categories'));
    }

}
