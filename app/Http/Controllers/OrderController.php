<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \App\Models\Item;
// use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $items = Item::all();
        // Cache::remember('items', now()->addDays(30), function () {
        //     return
        // });

        $data = [
            "title" => "pemesanan",
            "nav" => "customer",
            "aside" => "no",
            "main" => "mid"
        ];

        return view('user/order', compact('data', 'items'));
    }


    public function orderStepOne(Request $request)
    {
        $user = Auth::user();
        $address = Address::where('user_id', $user->user_id)->where('is_default', true)->first();
        $courier = User::where('role', 2)->first();

        $order_id = 'LK-' . date('Ymd') . '-' . str_pad(Order::count() + 1, 4, '0', STR_PAD_LEFT);
        $order_date = now();
        $total_price = $request->total_price;
        $address_id = $address->address_id;
        $user_id = $user->user_id;
        $status = 0;

        // Create the order
        $order = Order::create([
            'order_id' => $order_id,
            'order_date' => $order_date,
            'total_price' => $total_price,
            'address_id' => $address_id,
            'user_id' => $user_id,
            'status' => $status,
            'courier_id' => $courier->user_id
        ]);

        if ($request->has('items') && is_array($request->items)) {
            foreach ($request->items['quantity'] as $key => $quantity) {
                $item_id = $request->items['item_id'][$key];
                $price = $request->items['price'][$key];

                // Mengalikan harga dengan quantity
                $total_price_item = $price * $quantity;

                // Contoh menyimpan total harga item ke dalam OrderItem
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->order_id;
                $orderItem->item_id = $item_id;
                $orderItem->quantity = $quantity;
                $orderItem->price = $total_price_item;
                $orderItem->save();
            }
        } else {
            // Handle jika $request->items tidak valid
            return redirect()->back()->with('error', 'Item yang dipilih tidak valid');
        }



        // Redirect to the next step of the order process or to the order completion page
        return redirect()->route('order.StepTwo', ['order_id' => $order->order_id]);

    }


    public function orderStepTwo($order_id)
    {
        $user = Auth::user();
        $order = Order::where('user_id', $user->user_id)->orderBy('created_at', 'desc')->first();

        if (!$order) {
            // Handle jika pesanan tidak ditemukan
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan');
        }

        $order_id = $order->order_id;

        $data = [
            "title" => "pemesanan2",
            "nav" => "customer",
            "aside" => "no",
            "main" => "mid"
        ];

        return view('user.orderSecond', compact('order_id', 'data'));

    }


//     public function storeSecond(Request $request)
// {
//     $order = Order::where('order_code', $request->order_code)->firstOrFail();
//     $order->pickup_date = $request->pickup_date;
//     $order->message_order = $request->message_order;
//     $order->status = 1;
//     $order->order_method = $request->order_method;
//     $order->save();

//     $address_id = $request->address_id;
//     $order->address_id = $address_id;
//     $order->save();

//     // Redirect to home page with the order code as parameter
//     return redirect()->route('home', ['orderCode' => $order->order_code]);
// }
}


