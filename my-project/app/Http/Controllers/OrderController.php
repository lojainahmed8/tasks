<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('user')->get();
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $products = Product::all();
        return view('orders.create', compact('users', 'products'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|array|min:1',
            'product_id.*' => 'exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
        ]);

        $order = Order::create(['user_id' => $validated['user_id']]);

        foreach ($validated['product_id'] as $index => $productId) {
            $product = Product::findOrFail($productId);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $validated['quantity'][$index],
                'price' => $product->price,
            ]);
        }

        return to_route('orders.index')->with('success', 'Order created successfully');
    }

    public function show(string $id)
    {
        $order = Order::with('user', 'orderItems.product')->findOrFail($id);
        return view('orders.show', compact('order'));
    }

    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);
        $order->delete();
        return to_route('orders.index')->with('success', 'Order deleted successfully');
    }
}