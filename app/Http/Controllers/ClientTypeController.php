<?php

namespace App\Http\Controllers;

use App\Models\client\ClientType;
use App\Http\Requests\StoreClientTypeRequest;
use App\Http\Requests\UpdateClientTypeRequest;

class ClientTypeController extends Controller
{
    public function index()
    {
        $client_types = ClientType::all();
        return view('pages.client_type.index', compact('client_types'));
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client\ClientType  $clientType
     * @return \Illuminate\Http\Response
     */
    public function show(ClientType $clientType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client\ClientType  $clientType
     * @return \Illuminate\Http\Response
     */
    public function edit(ClientType $clientType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientTypeRequest  $request
     * @param  \App\Models\client\ClientType  $clientType
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientTypeRequest $request, ClientType $clientType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client\ClientType  $clientType
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClientType $clientType)
    {
        //
    }
}
