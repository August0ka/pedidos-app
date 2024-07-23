<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
use Exception;

class OrdersController extends Controller
{
    public function index() {
        $orderStatusCollect = collect(Order::ORDER_STATUS);
        $orderStatus = $orderStatusCollect->prepend('Selecione...', '');
        $orders = Order::orderByDesc('id')->get();

        return view('orders.index', compact('orderStatus', 'orders'));
    }

    public function store (Request $request) {
        if(!$request->get('client_name') || !$request->get('order_date') || !$request->get('delivery_date') || !$request->get('status')) {
            return response()->json(['message' => 'Todos os campos são obrigatórios'], 500);
        }
        try {
            $order = Order::create($request->all());
            return response()->json(['message' => 'Pedido criado com sucesso!']);
        } catch (Exception $e) {
            return response()->json(['message' => 'Erro ao criar pedido'], 500);
        }

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
        try {
            $order->delete();
            return response()->json(['message' => 'Pedido deletado com sucesso!']);
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function consultOrders() {
        $orders = Order::orderByDesc('id')->get();
        if($orders->isEmpty()) {
            return response()->json(['message' => 'Nenhum pedido encontrado'], 404);
        }

        return response()->json($orders);
    }
}
