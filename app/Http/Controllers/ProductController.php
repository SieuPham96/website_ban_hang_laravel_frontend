<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    public function addToCart($id){
        $product = Product::find($id);
        $cart = session()->get('cart');
        if( isset($cart[$id]) ){
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + 1;
        }
        else {
            $cart[$id] = [
                'name' => $product->name,
                'price' => $product->price,
                'image' => config('app.base_url').$product->feature_image_path,
                'quantity' => 1,
            ];
        }
        session()->put('cart', $cart);
        return response()->json([
            'code' => 200,
            'message' => 'success',
        ], 200);
    }

    public function showCart(){
        $categoriesLimit = $this->getCategory();
        $carts = session()->get('cart');
        return view('product.cart', compact('carts', 'categoriesLimit'));
    }

    public function updateCart(Request $request){
        if( $request->id && $request->quantity ){
            $carts = session()->get('cart');
            $carts[$request->id]['quantity'] = $request->quantity;
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $showCart = view('product.components.show_cart', compact('carts'))->render();
            return response()->json([
                'show_cart' => $showCart, 
                'code' => 200,
            ], 200);
        }
    }

    public function deleteCart(Request $request){
        if( $request->id ){
            $carts = session()->get('cart');
            unset($carts[$request->id]);
            session()->put('cart', $carts);
            $carts = session()->get('cart');
            $showCart = view('product.components.show_cart', compact('carts'))->render();
            return response()->json([
                'show_cart' => $showCart, 
                'code' => 200,
            ], 200);
        }
    }
}
