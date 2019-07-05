<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.checkout');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = session()->get('cart');

        $shipping = 0;
        $total = 0;
        foreach ($cart as $item) {
            $shipping += $item['quantity'] * $item['weight'];
            $total += $item['quantity'] * $item['price'];
        }

        $shipping = ceil($shipping / 1000) * 5000;
        $rand = rand(100, 999);
        $total += $shipping - $rand;

        $order = new Order([
            'user_id' => auth()->user()->id,
            'address' => $request->address,
            'status' => 'Pending',
            'shipping' => $shipping,
            'total' => $total
        ]);

        $order->save();

        foreach ($cart as $item) {
            $orderItem = new OrderItem([
                'product_id' => (int)$item['id'],
                'order_id' => $order->id,
                'quantity' => (int)$item['quantity'],
                'price' => (float)$item['price']
            ]);
            $orderItem->save();
        }

        session()->put('cart', null);

        return view('orders.payment', compact('total'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
