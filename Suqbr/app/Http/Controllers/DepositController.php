<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;

use App\Deposit;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

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

        return $order_detail = OrderDetail::find($request->order_detail_id);
        $deposit = new Deposit();
        $deposit->user_id = $order_detail->user_id;
        $deposit->product_id = $order_detail->product_id;
        $deposit->order_id = $order_detail->order_id;
        $deposit->deposit_amount = $order_detail->profit;
        $deposit->save();
        $order_detail->commission_splitting_status = 'done';
        $order_detail->update();
        return 'success';

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
