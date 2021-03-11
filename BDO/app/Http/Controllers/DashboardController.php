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
        return view('bdo.login');
    }
    public function dashboard(){
        $total_distributor = User::where('bdo_id', Auth::user()->id)->where('user_type', 'distributor')->where('is_distributor', 1)->count();

        /*$merchant_today = User::where('distributor_id', Auth::user()->id)
            ->whereDate('created_at',Carbon::today())->count();
        $total_merchant = User::where('distributor_id', Auth::user()->id)->count();*/

        $merchants = User::where('bdo_id', Auth::user()->id)
                      ->where('is_distributor', 1)->get();


        $bdo_profit = 0;
        $depositProfit = 0;
        $depositPoint = 0;
        $bdo_today_profit = 0;
        foreach ($merchants as $merchant){

            $result = DB::table('order_details')->where('user_id', $merchant->id)->sum('profit');


            $depositProfit += DB::table('deposits')->where('user_id', $merchant->id)->sum('deposit_amount');

            $depositPoint += DB::table('deposits')->where('user_id', $merchant->id)->sum('deposit_club_point');



            $bdo_profit += $result * (2.5/100);
            $today_result = DB::table('order_details')->where('user_id', $merchant->id)
                ->whereDate('created_at',Carbon::today())->sum('profit');
            $bdo_today_profit += $today_result * (2.5/100);


        }

        return view('bdo.dashboard', compact('total_distributor', 'bdo_profit', 'bdo_today_profit', 'depositProfit', 'depositPoint'));
    }
}
