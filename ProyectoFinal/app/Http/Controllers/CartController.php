<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Carrito;

class CartController extends Controller
{
    public function addToCart(Request $request, Producto $product)
    {
        $cart = session()->get('cart');

        // If the cart is empty, create a new one
        if (!$cart) {
            $cart = [
                $product->id => [
                    "nombre" => $product->nombre,
                    "productId" => $product->id,
                    "cantidad" => 1,
                    "precio" => $product->precio,
                    "imagenUrl" => $product->imagenUrl,
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Producto agregado al carrito.');
        }

        // If the product is already in the cart, increase the quantity
        if (isset($cart[$product->id])) {
            $cart[$product->id]['cantidad']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Producto agregado al carrito.');
        }

        // If the product is not in the cart, add it with a quantity of 1
        $cart[$product->id] = [
            "nombre" => $product->nombre,
            "productId" => $product->id,
            "cantidad" => 1,
            "precio" => $product->precio,
            "imagenUrl" => $product->imagenUrl,
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    public function index()
    {
        $cartItems = session()->get('cart');

        if (!$cartItems) {
            $cartItems = [];
        }

        return view('cart', compact('cartItems'));
    }

    public function update($cartItemId, Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$cartItemId])) {
            $cart[$cartItemId]['cantidad'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function remove($cartItemId)
    {
        $cart = session()->get('cart');

        if (isset($cart[$cartItemId])) {
            unset($cart[$cartItemId]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'El producto ha sido removido del carrito');
    }

    public function cart()
    {
        $cartItems = session()->get('cart');

        if (!$cartItems) {
            $cartItems = [];
        }

        $totalItems = 0;
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $totalItems += $item['cantidad'];
            $totalPrice += $item['cantidad'] * $item['precio'];
        }

        return view('cart', compact('cartItems', 'totalItems', 'totalPrice'));
    }
}
