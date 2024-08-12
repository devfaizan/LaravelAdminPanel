<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // public function showOrders($status = null)
    // {
    //     if ($status) {
    //         $orders = Order::where('order_status', $status)->paginate(5);
    //     } else {
    //         $orders = Order::paginate(5);
    //     }

    //     $totalOrders = Order::count();
    //     $pendingOrders = Order::where('order_status', 'pending')->count();
    //     $inprocessOrders = Order::where('order_status', 'Inprocess')->count();
    //     $fulfilledOrders = Order::where('order_status', 'fulfilled')->count();

    //     return view('order.order', compact('orders', 'totalOrders', 'pendingOrders', 'inprocessOrders', 'fulfilledOrders', 'status'));
    // }
    // public function showOrders($status = null)
    // {
    //     if ($status) {
    //         $orders = Order::with('customer', 'cart')->where('order_status', $status)->paginate(5);
    //     } else {
    //         $orders = Order::with('customer', 'cart')->paginate(5);
    //     }

    //     $totalOrders = Order::count();
    //     $pendingOrders = Order::where('order_status', 'pending')->count();
    //     $inprocessOrders = Order::where('order_status', 'Inprocess')->count();
    //     $fulfilledOrders = Order::where('order_status', 'fulfilled')->count();

    //     return view('order.order', compact('orders', 'totalOrders', 'pendingOrders', 'inprocessOrders', 'fulfilledOrders', 'status'));
    // }
    // public function showOrders($status = null)
    // {
    //     if ($status) {
    //         $orders = Order::with(['customer', 'cart.items'])->where('order_status', $status)->paginate(5);
    //     } else {
    //         $orders = Order::with(['customer', 'cart.items'])->paginate(5);
    //     }

    //     $totalOrders = Order::count();
    //     $pendingOrders = Order::where('order_status', 'pending')->count();
    //     $inprocessOrders = Order::where('order_status', 'Inprocess')->count();
    //     $fulfilledOrders = Order::where('order_status', 'fulfilled')->count();

    //     return view('order.order', compact('orders', 'totalOrders', 'pendingOrders', 'inprocessOrders', 'fulfilledOrders', 'status'));
    // }
    public function showOrders($status = null)
    {
        if ($status) {
            $orders = Order::with(['customer', 'cart.items'])->where('order_status', $status)->paginate(4);
        } else {
            $orders = Order::with(['customer', 'cart.items'])->paginate(4);
        }

        $totalOrders = Order::count();
        $pendingOrders = Order::where('order_status', 'pending')->count();
        $inprocessOrders = Order::where('order_status', 'Inprocess')->count();
        $fulfilledOrders = Order::where('order_status', 'fulfilled')->count();

        return view('order.order', compact('orders', 'totalOrders', 'pendingOrders', 'inprocessOrders', 'fulfilledOrders', 'status'));
    }
    public function editOrder($id)
    {
        $order = Order::where('order_id', $id)->first();
        if (!$order) {
            return redirect('/orders')->with('error', 'Order Not Found');
        }
        return view('order.editorder', compact('order'));
    }

    public function updateOrder(Request $request, $id)
    {
        $incomingData = $request->validate([
            "status" => ['required']
        ]);

        $order = Order::where('order_id', $id)->first();
        if (!$order) {
            return redirect('/orders')->with('error', 'Order Not Found');
        }
        $order->update([
            'order_status' => $incomingData['status'],
        ]);
        return redirect('/orders')->with('success', 'Order Status Changed Successfully');
    }

}
