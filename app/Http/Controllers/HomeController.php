<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($orderCode = null)
    {
        // Cek apakah ada orderCode yang diberikan
        if ($orderCode) {
            // Lakukan operasi yang sesuai dengan orderCode yang diberikan
            // Misalnya, dapat Anda gunakan untuk mengambil data pesanan terkait
            $order = Order::where('order_code', $orderCode)->first();
            // Lakukan operasi lainnya sesuai kebutuhan Anda

            // Kirim data pesanan ke tampilan
            return view('user/home', [
                "title" => "Home",
                "nav" => "customer",
                "aside" => "yes",
                "order" => $order,
            ]);
        }

        // Jika tidak ada orderCode yang diberikan, lanjutkan dengan tampilan beranda biasa
        return view('user/home', [
            "title" => "Home",
            "nav" => "customer",
            "aside" => "yes",
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('admin/adminhome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function kurirHome()
    {
        return view('kurir/kurirhome');
    }


}
