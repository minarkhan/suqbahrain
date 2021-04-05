<?php

namespace App\Http\Controllers;

use App\ProfitSetting;
use Illuminate\Http\Request;

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
        $mk = new ProfitSetting;
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
        $validated = $request->validate([
            'suqbahrain' => 'required',
            'bdo'=> 'required',
            'marchant'=> 'required',
            'distributor'=> 'required',
            'customer'=> 'required',
            'profit_start'=> 'required',
            'profit_end'=> 'required',
        ]);

            $profitsettings = new ProfitSetting();
            $profitsettings->suqbahrain_comission  = '$request->suqbahrain';
            // $profitsettings->bdo_comission  = $request->bdo;
            // $profitsettings->marchant_comission = $request->marchant;
            // $profitsettings->distributor_comission = $request->distributor;
            // $profitsettings->start_date = $request->profit_start;
            // $profitsettings->end_date = $request->profit_end;
            $profitsettings->save();

            return $this->index();
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
