<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\CheckoutCustomerRequest;


class CheckoutController extends Controller
{
    // public function getCategory(){
    //     return Category::where('parents_id', 0)->take(3)->get();
    // }
    public function loginCheckout(Request $request){
        $categoriesLimit = $this->getCategory();
        return view('product.checkout.login_checkout', compact('categoriesLimit'));
    }

    public function logoutCheckout(){
        session()->flush();
        return redirect()->route('loginCheckout');
    }

    public function checkout(Request $request){
        $categoriesLimit = $this->getCategory();
        $carts = session()->get('cart');
        return view('product.checkout.show_checkout', compact('categoriesLimit', 'carts'));
    }

    public function addCustomer(RegisterRequest $request){
        $customer = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => md5($request->password),
            'phone' => $request->phone,
        ];
        $customerId = DB::table('customers')->insertGetId($customer);
        session()->put('customer_id', $customerId);
        return redirect()->route('checkout');
    }

    public function loginCustomer(LoginRequest $request){
        $email_account = $request->email_account;
        $password_account = md5($request->password_account);
        $result = DB::table('customers')
                    ->where('email',$email_account)
                    ->where('password',$password_account)->first();
        if( $result ){
            session()->put('customer_id', $result->id);
            return redirect()->route('checkout');
        }
        else {
            return redirect()->route('loginCheckout');
        }
    }

    public function saveCheckoutCustomer(CheckoutCustomerRequest $request){
        // insert shipping table
        $shippingInfo = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ];
        $shippingId = DB::table('shipping')->insertGetId($shippingInfo);
        session()->put('shipping_id', $shippingId);

        $customerId = session()->get('customer_id');
        $carts = session()->get('cart');
        
        // insert order table
        $total = 0;
        foreach( $carts as $id => $cart ){
            $orderDetails = [
                'customer_id' => $customerId,
                'shipping_id' => $shippingId,
                'product_id' => $id,
                'quantity' => $cart['quantity'],
                'total' => $cart['price'] * $cart['quantity'],
            ];
            $order = DB::table('order')->insert($orderDetails);
        }
        session()->put('order', $order);
        return redirect()->route('order');
    }

    public function order(){
        $categoriesLimit = $this->getCategory();
        $shippingId = session()->get('shipping_id');
        $orders = DB::table('order')
                    ->join('customers', 'order.customer_id', '=', 'customers.id')
                    ->join('shipping', 'order.shipping_id', '=', 'shipping.id')
                    ->select('order.*', 'shipping.*')
                    ->where('shipping_id', '=', $shippingId)
                    ->get();
        return view('product.checkout.order', compact('orders', 'categoriesLimit'));
    }

}
