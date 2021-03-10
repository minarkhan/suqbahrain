<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

use App\Deposit;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_details = DB::table('order_details')->orderBy('created_at', 'DESC')->get();
        return view('deposit.index', compact('order_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    $order_detail = OrderDetail::find($request->order_detail_id);
    // return Carbon::now()->diffInDays($order_detail->created_at);

    if($order_detail->commission_splitting_status == 'pending' && $order_detail->payment_status == 'paid' && $order_detail->delivery_status == 'delivered'){

        //distributor
        $refDistributorCode = $order_detail->user->referred_by;
        $Distributor = User::where( 'referral_code', $refDistributorCode)->first();
        //BDO
        $refBDOCode = $Distributor->referred_by;
        $BDO = User::where( 'referral_code', $refBDOCode)->first();
        //Suq Bahrain.
        $suqbahrain = User::where( 'email', 'info@suqbahrain.com')->where('user_type', 'admin')->first();
        $profit = $order_detail->profit;

        if($order_detail->user->is_merchant == 1 && Carbon::now()->diffInDays($order_detail->created_at) > 6 ){

            //Marcent profit 50%
            $deposit1 = new Deposit();
            $deposit1->user_id = $order_detail->user_id;
            $deposit1->product_id = $order_detail->product_id;
            $deposit1->order_id = $order_detail->order_id;
            $deposit1->deposit_amount = ($profit * 50) / 100;
            $deposit1->save();

            //Dristributor profit 10%
            $deposit2 = new Deposit();
            $deposit2->user_id = $Distributor->id;
            $deposit2->product_id = $order_detail->product_id;
            $deposit2->order_id = $order_detail->order_id;
            $deposit2->deposit_amount = ($profit * 10) / 100;
            $deposit2->save();

            //BDO profit 2.5%
            $deposit3 = new Deposit();
            $deposit3->user_id = $BDO->id;
            $deposit3->product_id = $order_detail->product_id;
            $deposit3->order_id = $order_detail->order_id;
            $deposit3->deposit_amount = ($profit * 2.5) / 100;
            $deposit3->save();

            //Suq Bahrain profit 37.5%
            $deposit4 = new Deposit();
            $deposit4->user_id = $suqbahrain->id;
            $deposit4->product_id = $order_detail->product_id;
            $deposit4->order_id = $order_detail->order_id;
            $deposit4->deposit_amount = ($profit * 37.5) / 100;
            $deposit4->save();

        }

        $order_detail->commission_splitting_status = 'done';
        $order_detail->update();
        return redirect()->back();
    } else {
        return 'Are You Hacker??';
        // return redirect()->back()->with('success', 'Are You Hacker??');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
