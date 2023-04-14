<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ArticulosPedido;
use App\Models\Pedido;

class CheckoutController extends Controller
{
    public function index()
    {

        $cart = session()->get('cart');

        if (!$cart) {
            $cart = [];
        }

        $cartItems = 0;
        $totalItems = 0;
        $totalPrice = 0;

        foreach ($cart as $item) {
            $totalItems += $item['cantidad'];
            $totalPrice += $item['cantidad'] * $item['precio'];
        }

        return view('checkout', compact('cartItems', 'totalPrice', 'totalItems'));
    }

    public function process(Request $request)
    {
        $user = Auth::user();
        $cart = session()->get('cart');
        $cartItems = array_values($cart);
        $totalPrice = collect($cartItems)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });
        $totalItems = collect($cartItems)->sum('cantidad');

        // Create a new order
        $pedido = new Pedido();
        $pedido->idUsuario = $user->id;
        $pedido->estado = 'Pendiente';
        $pedido->cantidadTotal = $totalItems;
        $pedido->save();

        // Add items to the order
        foreach ($cartItems as $id => $cartItem) {
            $articuloPedido = new ArticulosPedido();
            $articuloPedido->idPedido = $pedido->id;
            $articuloPedido->idProducto = $cartItem['productId'];
            $articuloPedido->cantidad = $cartItem['cantidad'];
            $articuloPedido->precio = $cartItem['precio'];
            $articuloPedido->save();
        }

        // Clear the cart
        session()->forget('cart');
        $pedidoId = $pedido->id;

        return redirect()->route('checkout.success', compact('pedidoId', 'totalPrice'));
    }

    public function success($pedidoId, $totalPrice)
    {
        return view('checkout-succes', compact('pedidoId', 'totalPrice'));
    }

    public function confirmation(Request $request)
    {
        // Retrieve the user's cart from the session
        $cart = session()->get('cart');

        // Create a new order for the user
        $order = Pedido::create([
            'idUsuario' => auth()->user()->id,
            'estado' => 'Pendiente',
            'cantidadTotal' => $request->input('total')
        ]);

        // Loop through the items in the cart and add them to the order
        foreach ($cart as $item) {
            ArticulosPedido::create([
                'idPedido' => $order->id,
                'idProducto' => $item['id'],
                'cantidad' => $item['cantidad'],
                'precio' => $item['precio']
            ]);
        }

        // Clear the user's cart from the session
        session()->forget('cart');

        // Render the confirmation view
        return view('checkout.confirmation', compact('order'));
    }
}
