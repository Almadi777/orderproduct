<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\OrderService;
use Illuminate\Foundation\Http\FormRequest;

class OrderController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function index(FormRequest $request)
    {
        $orders = $this->orderService->index($request);

        return response()->json($orders, 200);
    }

    public function show(Order $order)
    {
        $order = $this->orderService->show($order);

        return response()->json($order, 200);
    }

    public function store(FormRequest $request)
    {
        $order = $this->orderService->store($request);

        return response()->json($order, 201);
    }

    public function update(FormRequest $request, Order $order)
    {
        $order = $this->orderService->update($request, $order);

        return response()->json($order, 200);
    }

    public function destroy(Order $order)
    {
        $this->orderService->destroy($order);

        return response()->json([], 204);
    }
}

