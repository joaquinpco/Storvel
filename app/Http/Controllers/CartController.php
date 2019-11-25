<?php
namespace App\Http\Controllers;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(Request $request)
    {
        $cart = new Cart($request->session()->get('cart'));
        
        return view('cart.show', compact('cart'));
    }

    public function add(Product $product,Request $request)
    {
        $cart = new Cart($request->session()->get('cart'));
        $cart->add($product);
        $request->session()->put("cart", $cart);
        $request->session()->save();
        return view('cart.show', compact('cart'));
    }

    public function remove(Product $product,Request $request)
    {
        $cart = new Cart($request->session()->get('cart'));
        $cart->remove($product);
        $request->session()->put("cart", $cart);
        $request->session()->save();
        return view('cart.show', compact('cart'));
    }

    public function removeAll(Product $product,Request $request)
    {
        $cart = new Cart($request->session()->get('cart'));
        $cart->removeAll($product);
        $request->session()->put("cart", $cart);
        $request->session()->save();
        return view('cart.show', compact('cart'));
    }

    public function operation($sOperation, Product $product, Request $request)
    {
        switch($sOperation)
        {  
            case "add":
                return $this->add($product, $request);
            case "remove":
                return $this->remove($product, $request);
            case "removeAll":
                return $this->removeAll($product, $request);
            default:
                return $this->show($request);
        }


    }
}
