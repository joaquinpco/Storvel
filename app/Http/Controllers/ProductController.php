<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;


class ProductController extends Controller
{
    
    public function addToCart(Product $product, Request $request)
    {
        if($request->session()->exists('cart'))
        {
            $cart = new Cart($request->session()->get('cart'));

            $cart->add($product);
            $request->session()->put("cart", $cart);
            $request->session()->save();
        }
        else
        {
            $cart = new Cart();
            $cart->add($product);
            $request->session()->put("cart", $cart);
            $request->session()->save();
        }

        return redirect('/')->with('status', 'El producto ha sido añadido al carro!');
    }

    //
    function welcome()
    {
        $aProduct_offering = Product::Offerings();
        $aProduct_new = Product::NewProducts();

        return view('welcome', compact('aProduct_offering', 'aProduct_new'));
    }

    function detail(Product $product)
    {
        $aProduct_new = Product::NewProducts();
        return view('
        /product/detail',compact('product', 'aProduct_new'));
    }
}
