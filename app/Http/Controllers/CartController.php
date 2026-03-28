<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        $cartKey = $this->getCartKey();
        $cart = session()->get($cartKey, []);
        return view('cart.index', compact('cart'));
    }

    public function add(Product $product)
    {
        $cartKey = $this->getCartKey();
        $cart = session()->get($cartKey, []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "name" => $product->name,
                "price" => $product->price,
                "quantity" => 1
            ];
        }

        session()->put($cartKey, $cart);

        return redirect()->back()->with('success', 'Produkt pridaný do košíka');
    }

    public function remove($id)
{
    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

    if (isset($cart[$id])) {
        unset($cart[$id]);
    }

    session()->put($cartKey, $cart);

    return redirect()->route('cart.index')->with('success', 'Produkt odstránený');
}

private function getCartKey()
{
    return Auth::check() ? 'cart_user_' . Auth::id() : 'cart_guest';
}
public function increase($id)
{
    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    }

    session()->put($cartKey, $cart);

    return redirect()->route('cart.index');
}
public function decrease($id)
{
    $cartKey = $this->getCartKey();
    $cart = session()->get($cartKey, []);

    if (isset($cart[$id])) {
        if ($cart[$id]['quantity'] > 1) {
            $cart[$id]['quantity']--;
        } else {
            unset($cart[$id]);
        }
    }

    session()->put($cartKey, $cart);

    return redirect()->route('cart.index');
}
}
