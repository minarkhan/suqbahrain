<?php

namespace App\Http\Controllers;

use App\ProfitDistribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfitDistributionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_details = DB::table('order_details')->orderBy('created_at', 'DESC')->get();
        return view('profit_distribution.index', compact('order_details'));
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
     * @param  \App\ProfitDistribution  $profitDistribution
     * @return \Illuminate\Http\Response
     */
    public function show(ProfitDistribution $profitDistribution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfitDistribution  $profitDistribution
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfitDistribution $profitDistribution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfitDistribution  $profitDistribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfitDistribution $profitDistribution)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfitDistribution  $profitDistribution
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfitDistribution $profitDistribution)
    {
        //
    }
}
