<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\User;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(){


        $users = User::get();
        // $orders = DB::select('select * from orders');
        $orders = Order::all();
        $i = 1;
        foreach ($orders as $order) {
            dd($order->user->id);
            if($order->user_id !== null){
                echo $order->user_id . 'mk</br>' . $order->id;
                // DB::table('order_details')->where('id', $order->id)->delete();
                // // $order->delete();
                // echo $order->id. 'deleted';

            }
        }

        // dd($orders);
        // $orderDetail = OrderDetail::all();
        //  dd($orders->user_id);

        // foreach ($orders as $order) {
        //     echo $order->user_id . "==";
        //     if($order->user_id == null){
        //     echo $order->user_id . '</br>';
        //     }
        // }

        // $i = 1;
        // foreach ($users as $user) {
        //     echo $user->id . '</br>';
        // }



        // return $orders ;




        // $orderDetail = OrderDetail::find(342);
        // // {{ $orderDetail->product->user($orderDetail->seller_id)->name }}
        // return view('testFile', compact('orderDetail'));

        // return $orderDetail->seller->user->name;
    }
}
