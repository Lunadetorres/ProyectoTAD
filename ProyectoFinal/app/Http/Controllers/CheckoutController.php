<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrito;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\ArticulosPedido;
use App\Models\Pedido;
use App\Models\ArticulosCarrito;
use App\Models\Producto;
use App\Models\User;

class CheckoutController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = Auth::user();

            // Continue with your logic
            if ($userId == null) {
                return redirect()->back()->with('fail', 'User not registered');
            }
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->back()->with('fail', 'User not authenticated');
        }

        $cart = Carrito::where('idUsuario', '=', $userId)->distinct()->get()->first();

        if (!$cart) {
            return redirect()->back()->with('fail', 'Card dont exist');
        }

        $productsInCard = ArticulosCarrito::where('idCarrito', '=', $cart->id)->get();

        if ($productsInCard->count() == 0) {
            return redirect()->back()->with('fail', 'Card is empty');
        }

        $cartItems = 0;
        $totalItems = 0;
        $totalPrice = 0;

        foreach ($productsInCard as $item) {
            $product = Producto::where('id', '=', $item['idProducto'])->first();
            $totalItems += $item['cantidad'];
            $totalPrice += $item['cantidad'] * $product->precio;
        }

        return view('checkout', compact('cartItems', 'totalPrice', 'totalItems', 'user'));
    }

    public function process(Request $request)
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = Auth::user();

            // Continue with your logic
            if ($userId == null) {
                return redirect()->back()->with('fail', 'User not registered');
            }
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->back()->with('fail', 'User not authenticated');
        }

        $cart = Carrito::where('idUsuario', '=', $userId)->distinct()->get()->first();

        if (!$cart) {
            return redirect()->back()->with('fail', 'Card is empty');
        }

        $cartItems = ArticulosCarrito::where('idCarrito', '=', $cart->id)->get();
        $totalPrice = 0;
        $totalItems = collect($cartItems)->sum('cantidad');
        // Create a new order
        $pedido = new Pedido();
        $pedido->idUsuario = $user->id;
        $pedido->estado = 'Pendiente';
        $pedido->cantidadTotal = $totalItems;
        $pedido->save();

        // Add items to the order
        foreach ($cartItems as $id => $cartItem) {
            $product = Producto::where('id', '=', $cartItem['idProducto'])->first();
            $totalPrice += $cartItem['cantidad'] * $product->precio;
            $articuloPedido = new ArticulosPedido();
            $articuloPedido->idPedido = $pedido->id;
            $articuloPedido->idProducto = $cartItem['idProducto'];
            $articuloPedido->cantidad = $cartItem['cantidad'];
            $articuloPedido->precio = $product->precio;
            $articuloPedido->save();
        }

        ArticulosCarrito::destroy($cartItems);
        ArticulosCarrito::destroy($cart);

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
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = Auth::user();

            // Continue with your logic
            if ($userId == null) {
                return redirect()->back()->with('fail', 'User not registered');
            }
        } else {
            // Handle the case when the user is not authenticated
            return redirect()->back()->with('fail', 'User not authenticated');
        }

        $user = User::find($userId);

        $order = Pedido::where('idUsuario', '=', $userId)->distinct()->get();

        if ($order->count() == 0) {
            return redirect()->route('admin.index')->with('fail', 'No tiene ningún pedido');
        }

        $pedidosIds = $order->pluck('id')->toArray();

        $items = ArticulosPedido::whereIn('idPedido', $pedidosIds)->get();

        $totalItems = collect($items)->sum('cantidad');

        $totalPrice = 0;

        foreach ($items as $item) {
            $cantidad = $item['cantidad'];
            $precio = $item['precio'];

            $subtotal = $cantidad * $precio;
            $totalPrice += $subtotal;
        }


        // Render the confirmation view
        return view('checkout-comfirmation', compact('order', 'items', 'totalItems', 'totalPrice'));
    
    }
}
