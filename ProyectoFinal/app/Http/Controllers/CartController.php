<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Producto;
use App\Models\Carrito;
use App\Models\ArticulosCarrito;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, Producto $product)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            // Continue with your logic
            if ($userId == null) {
                return redirect()->back()->with('fail', 'User not registered');
            }
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->back()->with('fail', 'User not authenticated');
        }

        $cart = Carrito::where('idUsuario', '=', $userId)->distinct()->get();

        // If the cart is empty, create a new one
        if ($cart->count() == 0) {
            $userCart = new Carrito();
            $userCart->idUsuario = $userId;
            $userCart->save();
        }

        $cart = Carrito::where('idUsuario', '=', $userId)->get()->first();


        $productsInCard = ArticulosCarrito::where('idCarrito', '=', $cart->id)->where('idProducto', '=', $product->id)->get();

        if ($productsInCard->count() <= 1) {
            $cantidad = 1;
            if ($productsInCard->count() == 1) {
                $cantidad = $productsInCard[0]->cantidad;
                $cantidad++;
                $productsInCard[0]->cantidad = $cantidad;
                $productsInCard[0]->save();
                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'El producto se añadió al carrito de compra');
            }
            $productsInCardNew = new ArticulosCarrito();
            $productsInCardNew->idProducto = $product->id;
            $productsInCardNew->idCarrito = $cart->id;
            $productsInCardNew->cantidad = $cantidad;
            $productsInCardNew->save();

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'El producto se añadió al carrito de compra');
        } else {
            return redirect()->back()->with('fail', 'Producto ya existe en carrito');
        }
    }

    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            // Continue with your logic
            if ($userId == null) {
                return redirect()->back()->with('fail', 'User not registered');
            }
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->back()->with('fail', 'User not authenticated');
        }

        $cart = Carrito::where('idUsuario', '=', $userId)->distinct()->get();

        // If the cart is empty, create a new one
        if ($cart->count() == 0) {
            $cartItems = [];
        } else {
            $cartItems = ArticulosCarrito::where('idCarrito', '=', $cart->id)->get()->toArray();
        }

        if (!$cartItems) {
            $cartItems = [];
        }

        return view('cart', compact('cartItems'));
    }

    public function update($cartItemId, Request $request)
    {
        $cartItem = ArticulosCarrito::where('id', '=', $cartItemId)->first();

        if ($cartItem) {
            $cartItem->cantidad = $request->quantity;
            $cartItem->save();
        }

        return redirect()->back()->with('success', 'Updated');
    }

    public function remove($cartItemId)
    {
        $cartItem = ArticulosCarrito::where('id', '=', $cartItemId)->first();

        if ($cartItem) {
            $cartItem->delete();

            return redirect()->back()->with('success', 'El producto ha sido eliminado del carrito');
        } else {
            return redirect()->back()->with('failed', 'El producto no ha sido eliminado del carrito');
        }
    }

    public function cart()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;

            // Continue with your logic
            if ($userId == null) {
                return redirect()->back()->with('fail', 'User not registered');
            }
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->back()->with('fail', 'User not authenticated');
        }

        $cart = Carrito::where('idUsuario', '=', $userId)->distinct()->get()->first();

        if ($cart->count() == 1) {
            $cartItems = ArticulosCarrito::where('idCarrito', '=', $cart->id)->get()->toArray();
        } else {
            $cartItems = [];
        }

        if (!$cartItems) {
            $cartItems = [];
        }

        $totalItems = 0;
        $totalPrice = 0;
        $products = [];

        foreach ($cartItems as $item) {
            $product = Producto::where('id', '=', $item['idProducto'])->first();
            array_push($products, $product);
            // dd($product);
            $totalItems += $item['cantidad'];
            $totalPrice += $item['cantidad'] * $product->precio;
        }

        // dd($totalItems, $totalPrice);

        return view('cart', compact('cartItems', 'totalItems', 'totalPrice', 'products'));
    }
}
