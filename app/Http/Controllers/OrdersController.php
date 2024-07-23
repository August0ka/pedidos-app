<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function index() {
        $orderStatusCollect = collect(Order::ORDER_STATUS);
        $orderStatus = $orderStatusCollect->prepend('Selecione...', '');
        $orders = Order::all();

        return view('orders.index', compact('orderStatus', 'orders'));
    }

    public function store (Request $request) {
        if($request->get('client_name') == null || $request->get('order_date') == null || $request->get('delivery_date') == null || $request->get('status') == null) {
            return response()->json(['message' => 'Todos os campos são obrigatórios'], 500);
        }

        Order::create($request->all());
    }

    public function edit(Order $order) {
        $order->order_date = Carbon::parse($order->order_date)->format('Y-m-d');
        $order->delivery_date = Carbon::parse($order->delivery_date)->format('Y-m-d');

        return $order;
    }
    public function update(Request $request, Order $order) {
        $order->update($request->all());

        return response()->json(['message' => 'Pedido atualizado com sucesso!']);
    }

    public function destroy(Order $order) {
        $order->delete();

        return response()->json(['message' => 'Pedido deletados com sucesso!']);
    }
}
