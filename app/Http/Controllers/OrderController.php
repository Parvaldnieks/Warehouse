<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Item;

class OrderController extends Controller
{
    // Show all orders (for admin or specific user if needed)
    public function index()
    {
        $orders = Order::with('orderItems.item')->get();
        return view('orders.index', compact('orders'));
    }

    // Render the order creation form
    public function create(Request $request)
{
    // Retrieve the product ID from the query string
    $productId = $request->input('product_id');

    // Find the item or fail
    $item = Item::findOrFail($productId);

    // Render the order creation form view
    return view('orders.create', compact('item')); // change to orders.create
}

    // Store a new order
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:items,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        // Create the order
        $order = Order::create([
            'user_id' => auth()->id(), // Assuming the user is logged in
            'status' => 'pending', // Default status
            'total_price' => 0, // Will calculate later
        ]);

        $totalPrice = 0;

        // Process each item
        foreach ($request->items as $orderItemData) {
            $item = Item::findOrFail($orderItemData['product_id']);
            $quantity = $orderItemData['quantity'];

            // Check if enough stock is available
            if ($item->quantity < $quantity) {
                return redirect()->back()->withErrors([
                    'message' => "Insufficient stock for item: {$item->name}",
                ]);
            }

            // Calculate total price for this item
            $itemTotal = $item->price * $quantity;
            $totalPrice += $itemTotal;

            // Deduct stock
            $item->decrement('quantity', $quantity);

            // Create the order item
            OrderItem::create([
                'order_id' => $order->id,
                'item_id' => $item->id,
                'quantity' => $quantity,
                'price' => $item->price,
            ]);
        }

        // Update order's total price
        $order->update(['total_price' => $totalPrice]);

        // Redirect with success message
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    // Show details of a specific order
    public function show(Order $order)
    {
        $order->load('orderItems.item');
        return view('orders.show', compact('order'));
    }

    public function destroy(Order $order)
{
    // Optional: If you want to restock items when the order is deleted, do it here
    foreach ($order->orderItems as $orderItem) {
        $item = $orderItem->item;
        $item->increment('quantity', $orderItem->quantity);
    }

    // Delete the order
    $order->delete();

    // Redirect back with a success message
    return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
}

public function dashboard()
{
    // Fetch total items, low stock items, and recent orders
    $totalItems = Item::count();
    $lowStockItemsCount = Item::where('quantity', '<=', 10)->count();
    $recentOrders = Order::latest()->take(5)->get(); // Fetch 5 most recent orders

    return view('dashboard', compact('totalItems', 'lowStockItemsCount', 'recentOrders'));
}
}
