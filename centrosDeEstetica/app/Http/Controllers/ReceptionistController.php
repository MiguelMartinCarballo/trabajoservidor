<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReceptionistRequest;
use App\Http\Requests\UpdateReceptionistRequest;
use App\Models\Receptionist;

class ReceptionistController extends Controller
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
     * @param  \App\Http\Requests\StoreReceptionistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReceptionistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function show(Receptionist $receptionist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function edit(Receptionist $receptionist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReceptionistRequest  $request
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReceptionistRequest $request, Receptionist $receptionist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Receptionist  $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptionist $receptionist)
    {
        //
    }
}
