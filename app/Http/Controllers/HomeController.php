<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parents_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        $productsRecommend = Product::latest('views_count', 'desc')->take(12)->get();
        $categoriesLimit = $this->getCategory();
        return view('home.home', compact('sliders', 'categories', 'products', 'productsRecommend', 'categoriesLimit'));
    }

    public function search(Request $request)
    {
        $sliders = Slider::latest()->get();
        $categories = Category::where('parents_id', 0)->get();
        $products = Product::latest()->take(6)->get();
        $categoriesLimit = $this->getCategory();
        $keywords = $request->keywords_submit;
        $searchProduct = Product::where('name', 'like', '%'.$keywords.'%')->get();
        return view('product.search.search', compact('sliders', 'categories', 'products', 'categoriesLimit', 'searchProduct'));
    }
}
