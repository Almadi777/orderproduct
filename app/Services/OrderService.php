<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class OrderService
{
    public function index(FormRequest $request)
    {
        $perPage = $request->input('per_page', 10);
        $page = $request->input('page', 1);
        $orderDate = $request->input('order_date');

        $orders = Order::when($orderDate, function ($query) use ($orderDate) {
            return $query->where('order_date', $orderDate);
        })->paginate($perPage, ['*'], 'page', $page);

        return $orders;
    }

    public function show(Order $order)
    {
        return $order;
    }

    public function store(FormRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'order_date' => 'required|date_format:d.m.Y',
            'phone' => 'required|regex:/^(\+7|8)[\d]{10}$/',
            'email' => 'required|email',
            'order_amount' => 'required|numeric|min:3000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'status_code' => 400
            ], 400);
        }

        $order = Order::create($request->all());
        return response()->json([
            'data' => $order,
            'status_code' => 201
        ], 201);
    }

    public function update(FormRequest $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'order_date' => 'required|date_format:d.m.Y',
            'phone' => 'required|regex:/^(\+7|8)[\d]{10}$/',
            'email' => 'required|email',
            'order_amount' => 'required|numeric|min:3000'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'status_code' => 400
            ], 400);
        }

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
