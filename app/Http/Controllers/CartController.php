<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $cart = Auth::user()->cart;
    $productos = $cart->productos;

    return view('cart', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'product_id' => 'required|integer|min:1',
            'quantity' => 'required',
        ]);

        $cart = new Cart();
        $cart->user_id = Auth::id();
        $cart->product_id = $data[('product_id')];
        $cart->quantity = $data[('quantity')];
        $cart->save();

        return redirect()->route('productos.index')->with('success', 'Producto agregado al carrito exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $userId = Auth::id();
        $carts = Cart::where('user_id', $userId)->get();
        $total = 0;
        foreach ($carts as $cart) {
            $cart->product_name = $cart->product->name;
            $cart->product_price = $cart->product->price;
            $total += $cart->quantity * $cart->product->price;
        }

        return view('cart', compact(['carts' => $carts,'total' => $total]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $userId = Auth::id();
        Cart::where('user_id', $userId)->delete();
    }

    public function pay()
    {
        $this->destroy();
        return redirect()->route('pay');
    }
}
