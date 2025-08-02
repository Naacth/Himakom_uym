<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Show order form
     */
    public function showOrderForm($produkId)
    {
        $produk = Produk::findOrFail($produkId);
        return view('orders.create', compact('produk'));
    }

    /**
     * Create new order
     */
    public function store(Request $request, $produkId)
    {
        $produk = Produk::findOrFail($produkId);

        $validator = Validator::make($request->all(), [
            'quantity' => 'required|integer|min:1',
            'payment_method' => 'required|in:qris,offline',
            'delivery_method' => 'required|in:pickup,delivery',
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:20',
            'customer_nim' => 'nullable|string|max:20',
            'customer_kelas' => 'nullable|string|max:50',
            'customer_email' => 'required|email',
            'customer_address' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $totalPrice = $produk->price * $request->quantity;

        $order = Order::create([
            'user_id' => Auth::id(),
            'produk_id' => $produk->id,
            'order_number' => Order::generateOrderNumber(),
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'payment_method' => $request->payment_method,
            'delivery_method' => $request->delivery_method,
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'customer_nim' => $request->customer_nim,
            'customer_kelas' => $request->customer_kelas,
            'customer_email' => $request->customer_email,
            'customer_address' => $request->customer_address,
            'notes' => $request->notes,
            'status' => 'pending',
        ]);

        return redirect()->route('orders.success', $order->id)
            ->with('success', 'Pesanan berhasil dibuat! Silakan tunggu konfirmasi dari admin.');
    }

    /**
     * Show order success page
     */
    public function success($orderId)
    {
        $order = Order::with(['produk', 'user'])->findOrFail($orderId);
        
        // Ensure user can only see their own order
        if (Auth::id() !== $order->user_id) {
            abort(403);
        }

        return view('orders.success', compact('order'));
    }

    /**
     * Show user's order history
     */
    public function history()
    {
        $orders = Auth::user()->orders()->with('produk')->latest()->get();
        return view('orders.history', compact('orders'));
    }

    /**
     * Show order detail
     */
    public function show($orderId)
    {
        $order = Order::with(['produk', 'user'])->findOrFail($orderId);
        
        // Ensure user can only see their own order
        if (Auth::id() !== $order->user_id) {
            abort(403);
        }

        return view('orders.show', compact('order'));
    }

    /**
     * Cancel order
     */
    public function cancel($orderId)
    {
        $order = Order::findOrFail($orderId);
        
        // Ensure user can only cancel their own order
        if (Auth::id() !== $order->user_id) {
            abort(403);
        }

        // Only allow cancellation if order is still pending
        if ($order->status !== 'pending') {
            return redirect()->back()->with('error', 'Pesanan tidak dapat dibatalkan karena sudah diproses.');
        }

        $order->update(['status' => 'cancelled']);

        return redirect()->route('orders.history')->with('success', 'Pesanan berhasil dibatalkan.');
    }

    /**
     * Admin: Show all orders
     */
    public function adminIndex()
    {
        $orders = Order::with(['user', 'produk'])->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Admin: Show order detail
     */
    public function adminShow($orderId)
    {
        $order = Order::with(['user', 'produk'])->findOrFail($orderId);
        return view('admin.orders.show', compact('order'));
    }

    /**
     * Admin: Update order status
     */
    public function adminUpdateStatus(Request $request, $orderId)
    {
        $order = Order::findOrFail($orderId);

        $validator = Validator::make($request->all(), [
            'status' => 'required|in:pending,confirmed,processing,shipped,delivered,cancelled',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
