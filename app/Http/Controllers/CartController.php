<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;
use App\Profile;
use Hash;
use App\Role;
use Storage;
use App\News;
use App\Product;
use App\Category;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('wel');
    }

    
    public function cart()
    {
        return view('cart');
    }
   

    public function add_to_cart($id)
    {
        $product = Product::find($id);
        if(!$product) {

           return redirect()->back()->with('warning', 'Product Not Exist');
        }
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                    $id => [
                        "slug" => $product->slug,
                        "title" => $product->title,
                        "quantity" => 1,
                        "price" => $product->price,
                        "thumbnail" => $product->thumbnail
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success',count($cart).' Product added to cart successfully!');
        }

           // if cart not empty then check if this product exist then increment quantity
           if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success',count($cart).' Product added to cart successfully!');
        }


           // if item not exist in cart then add to cart with quantity = 1
           $cart[$id] = [
            "slug" => $product->slug,
            "title" => $product->title,
            "quantity" => 1,
            "price" => $product->price,
            "thumbnail" => $product->thumbnail
        ];

        session()->put('cart', $cart);
        return redirect()->back()->with('success', count($cart).' Products added to cart successfully!');
    }


    public function increament($id)
    {
      
         $cart = session()->get('cart');
         $old = $cart[$id]["quantity"];
         $cart[$id]["quantity"] = ++$old;
         session()->put('cart', $cart);
         return redirect()->back()->with('success', 'Products Updated successfully');
    }

    public function decreament($id)
    {
        
         $cart = session()->get('cart');
         $old = $cart[$id]["quantity"];
         $cart[$id]["quantity"] = --$old;
         session()->put('cart', $cart);
         return redirect()->back()->with('success', 'Products Updated successfully');
    }

    public function remove($id)
    {
        
            $cart = session()->get('cart');
            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }

         return redirect()->back()->with('success', 'Product removed successfully');
    }


}
