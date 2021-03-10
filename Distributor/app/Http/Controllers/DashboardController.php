<?php

namespace App\Http\Controllers;

use App\OrderDetail;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function login(){
        return view('distributor.login');
    }
    public function dashboard(){
        $merchant_today = User::where('distributor_id', Auth::user()->id)
            ->whereDate('created_at',Carbon::today())->count();
        $total_merchant = User::where('distributor_id', Auth::user()->id)->count();

        $merchants = User::where('distributor_id', Auth::user()->id)
                      ->where('is_merchant', 1)->get();
        $distributor_profit = 0;
        $distributor_today_profit = 0;
        foreach ($merchants as $merchant){

            $result = DB::table('order_details')->where('user_id', $merchant->id)->sum('profit');
            $distributor_profit += $result * (10/100);
            $today_result = DB::table('order_details')->where('user_id', $merchant->id)
                ->whereDate('created_at',Carbon::today())->sum('profit');
            $distributor_today_profit += $today_result * (10/100);

        }

        return view('distributor.dashboard', compact('total_merchant', 'merchant_today', 'distributor_profit', 'distributor_today_profit'));
    }
}
