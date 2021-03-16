<?php

namespace App\Http\Controllers;

use App\BankInfo;
use App\OrderDetail;
use App\User;
use App\Withdraw;
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

        $user = Auth::user();
        //total distributors of BDO
        $total_distributor = User::where('bdo_id', $user->id)->where('user_type', 'distributor')->where('is_distributor', 1)->count();

        $merchants = User::where('bdo_id', $user->id)
                      ->where('is_distributor', 1)->get();

        $bdo_profit = 0;
        $withdrawamount =0;
        $bdo_today_profit = 0;
        foreach ($merchants as $merchant){

            $result = DB::table('order_details')->where('user_id', $merchant->id)->sum('profit');
            $bdo_profit += $result * (2.5/100);
            $today_result = DB::table('order_details')->where('user_id', $merchant->id)
                ->whereDate('created_at',Carbon::today())->sum('profit');
            $bdo_today_profit += $today_result * (2.5/100);

        }

        //bdo bank info
        $bankinfo = BankInfo::select('id', 'ac_holder', 'ac_no', 'bank_name', 'iban_number')->where('user_id', $user->id)->where('status', 'primary')->first();

        //Last Withdraw avialble date.
        $lastwithdraw = Withdraw::select('created_at')->where('user_id', $user->id)->orderBy('created_at', 'DESC')->first();
        if(!$lastwithdraw > 0){
            $lastwithdraw = $user;
        }
        //total deposite Profit amount
        $depositProfit = DB::table('deposits')->where('user_id', $user->id)->sum('deposit_amount');
        //Total earn points
        $depositPoint = DB::table('deposits')->where('user_id', $user->id)->sum('deposit_club_point');
        //Available profit amount
        $withdrawamount = DB::table('withdraws')->where('user_id', $user->id)->sum('withdraw_amount');
        $availbleProfit = $depositProfit-$withdrawamount;

        return view('bdo.dashboard', compact('total_distributor', 'bdo_profit', 'bdo_today_profit', 'availbleProfit', 'depositPoint', 'bankinfo', 'withdrawamount', 'lastwithdraw'));
    }
}
