<?php

namespace App\Http\Controllers;

use App\Models\client\Client;
use App\Models\client\ClientType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Support\Facades\Redirect;
use Validator, Input, Redirect;



class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('admin2.pages.client.index', compact('clients'));
//        return view('pages.client.index', compact('clients'));
    }

    public function create()
    {
        $client_types = ClientType::all();
        return view('admin2.pages.client.create', compact('client_types'));
//        return view('pages.client.create', compact('client_types'));
    }

    public function store(Request $request)
    {
        $messages=
            [
                'name.required'       =>   "The :attribute field is required",
                'email.email'         =>    "The :attribute :input format should be example@example.com/.in/.edu/.org....",
                'phone.digits:11'     =>    "The :attribute should be 11 digits long",
                'commission.required' => 'The :attribute field is required.',
                'commission.numeric'  => 'The :attribute must be a number.',
                'commission.between'  => 'The :attribute must be between :min and :max.',
//                'address.string'         =>    "The :attribute :input must be in the form of a string"

            ];

        $rules = [
            'uuid' => 'required',
            'client_type_id' => 'required|numeric',
            'name' => 'required|max:200',
            'email' => 'nullable|email',
            'phone' => 'nullable|digits:11',
            'commission' => 'required|numeric|between:0,100',
//            'client_image' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
        ];

        $validate =  Validator::make($request->all(),$rules,$messages);


        $client = new Client;

        $client->uuid = Str::uuid();
        $client->client_type_id = $request->input('client_type_id');
        $client->name = $request->input('name');
        $client->email = $request->input('email');
        $client->phone = $request->input('phone');
        $client->address = $request->input('address');

//        if ($request->hasFile('client_image')) {
//            $imageName = time().'.'.$request->client_image->extension();
//            $request->client_image->move(public_path('pp/images/clients'), $imageName);
//            $client->client_image = $imageName;
//        }
        $client->commission = $request->input('commission');
        $client->note = $request->input('note');
        $client->vat_on_status = $request->input('vat_on');
        $client->client_commission_status = $request->input('client_commission_status');
        $client->discount_status = $request->input('discount_status');
        $client->created_by = 1;
        $client->updated_by = 1;

        if($client->save())
        {
            Toastr::success('Client created successfully', 'Client', ["progressBar" => "true"]);
            return redirect()->route('client.create')->withErrors($validate)->with('success', 'Client created successfully');
        }else{
            Toastr::error('Something went wrong! Please check and resubmit.', 'Client', ["progressBar" => "true"]);
            redirect()->back();
        }
    }

    public function show($uuid)
    {
        //Show the form for all info

        $client = Client::where('uuid', $uuid)->firstOrFail();
        $client_types = ClientType::all();
        return view('admin2.pages.client.view', compact('client', 'client_types'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\client\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $client = Client::where('uuid', $uuid)->firstOrFail();
        $client_types = ClientType::all();
        return view('admin2.pages.client.update', compact('client', 'client_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientRequest  $request
     * @param  \App\Models\client\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {

        // dd($uuid);
        // dd($request->all());
        $client = Client::where('uuid', $uuid)->firstOrFail();

        $client->client_type_id = (int)$request->client_type_id;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->address = $request->address;

//        if ($request->hasFile('client_image) {
//            $imageName = time().'.'.$request->client_image->extension();
//            $request->client_image->move(public_path('pp/images/clients, $imageName);
//            $client->client_image = $imageName;
//        }
        $client->commission = $request->commission;
        $client->note = $request->note;
        $client->vat_on_status = $request->vat_on;
        $client->client_commission_status = $request->client_commission_status;
        $client->discount_status = $request->discount_status;
        $client->created_by = 1;
        $client->updated_by = 1;

        if($client->save())
        {
            Toastr::success('Client updated successfully', 'Client', ["progressBar" => "true"]);
            return redirect()->route('client.lists')->with('success', 'Client updated successfully');
        }else{
            Toastr::error('Something went wrong! Please check and resubmit.', 'Client', ["progressBar" => "true"]);
            redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        $client = Client::findOrFail($uuid);

        if($client->delete())
        {
            Toastr::success('Client deleted successfully!', 'Client', ["progressBar" => "true"]);
            return redirect()->route('client.lists')->with('success', 'Client deleted successfully');
        }else{
            Toastr::error('Something went wrong! Can not delete client.', 'Client', ["progressBar" => "true"]);
            redirect()->back();
        }
    }
}
