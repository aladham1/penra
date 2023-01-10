<?php

namespace App\Http\Controllers;

use App\Models\DailyDemand;
use App\Http\Requests\StoreDailyDemandRequest;
use App\Http\Requests\UpdateDailyDemandRequest;

class DailyDemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreDailyDemandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDailyDemandRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function show(DailyDemand $dailyDemand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function edit(DailyDemand $dailyDemand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDailyDemandRequest  $request
     * @param  \App\Models\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDailyDemandRequest $request, DailyDemand $dailyDemand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DailyDemand  $dailyDemand
     * @return \Illuminate\Http\Response
     */
    public function destroy(DailyDemand $dailyDemand)
    {
        //
    }
}
