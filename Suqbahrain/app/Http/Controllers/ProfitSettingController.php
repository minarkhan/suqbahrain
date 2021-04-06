<?php

namespace App\Http\Controllers;

use App\ProfitSetting;
use Illuminate\Http\Request;
use App\ClubPointSetting;

class ProfitSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profitSettings = ProfitSetting::all();
        $mk = new ClubPointSetting();
        $mk->suqbahrain_comission  = 8;

        return view('profitSettings.create', compact('profitSettings'));

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
        // return $request;
        $this->validate($request, [
            'suqbahrain' => 'required',
            'bdo'=> 'required',
            'marchant'=> 'required',
            'distributor'=> 'required',
            'customer'=> 'required',
            'profit_start'=> 'required',
            'profit_end'=> 'required',
        ]);

            $profitsetting = new ProfitSetting;
            $profitsetting->suqbahrain_comission  = $request->suqbahrain;
            $profitsetting->bdo_comission  = $request->bdo;
            $profitsetting->marchant_comission = $request->marchant;
            $profitsetting->distributor_comission = $request->distributor;
            $profitsetting->start_date = $request->profit_start;
            $profitsetting->end_date = $request->profit_end;
            $profitsetting->save();
            return 'success ' . $profitsetting->id;

            // return $this->index();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfitSetting  $profitSetting
     * @return \Illuminate\Http\Response
     */
    public function show(ProfitSetting $profitSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfitSetting  $profitSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfitSetting $profitSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfitSetting  $profitSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfitSetting $profitSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfitSetting  $profitSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfitSetting $profitSetting)
    {
        //
    }
}
