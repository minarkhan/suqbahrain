<?php

namespace App\Http\Controllers;

use App\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Toastr;

class WithdrawAmountController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->user = Auth::user()->id;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return $this->user;
        $withdraws = Withdraw::orderBy('id', 'DESC')->where('user_id', $this->user)->get();
        return view('frontend.withdraw.index', compact('withdraws'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function show(Withdraw $withdraw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdraw $withdraw)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $withdraw = Withdraw::findOrFail($id);
        if($request->status == 'pending'){
            $withdraw->status = 'accepted';
            $withdraw->update();
            return redirect()->back();
        } elseif($request->status == 'accepted'){
            $withdraw->status = 'completed';
            $withdraw->update();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Withdraw  $withdraw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $withdraw = Withdraw::findOrFail($id);
        try {
            $withdraw->destroy($withdraw->id);
            flash('Withdraw request has been delete successfully')->warning();
            return redirect()->route('withdraw_amount.index');
        } catch (Exception $exception) {
            flash('Something went wrong')->error();
            return redirect()->back();
        }
    }
}
