<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $orderDate = $request->input('order_date');

        $orders = Order::when($orderDate, function ($query) use ($orderDate) {
            return $query->where('order_date', $orderDate);
        })->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'data' => $orders,
            'status_code' => 200
        ], 200);
    }

    public function show(Order $order)
    {
        return response()->json([
            'data' => $order,
            'status_code' => 200
        ], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'order_date' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'order_amount' => 'required|numeric|min:3000'
        ]);

        $order = Order::create($request->all());

        return response()->json([
            'data' => $order,
            'status_code' => 201
        ], 201);
    }

    public function update(Request $request, Order $order)
    {
        $this->validate($request, [
            'order_date' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'order_amount' => 'required|numeric|min:3000'
        ]);

        $order->update($request->all());

        return response()->json([
            'data' => $order,
            'status_code' => 200
        ], 200);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->json([
            'data' => [],
            'status_code' => 204
        ], 204);
    }
}
