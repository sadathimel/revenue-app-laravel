<?php

namespace App\Http\Controllers;

use App\Models\campaign\Campaign;
use App\Models\Vat;
use Illuminate\Http\Request;

class CampaignBillingController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::orderBy('created_at', 'DESC')->get();
        return view('pages.billing.index', compact('campaigns'));
    }

    public function create()
    {
        $campaigns = Campaign::orderBy('created_at', 'DESC')->get();
        return view('pages.billing.create', compact('campaigns'));
    }

    public function store(StoreCampaignBillingRequest $request)
    {
        //
    }

  

    // public function show($uuid)
    // {
    //     $campaign = Campaign::where('uuid', $uuid)->firstOrFail();
    //     $vat = Vat::where('id', 1)->first();
    //     return view('pages.billing.', compact('campaign','vat'));
    // }
    public function edit($uuid)
    {
        $campaign = Campaign::where('uuid', $uuid)->firstOrFail();
        $vat = Vat::where('id', 1)->first();
        return view('pages.billing.update', compact('campaign','vat'));
    }

    public function update(Request $request, $uuid)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
//        $request->validate([
//            'stock_name'=>'required',
//            'ticket'=>'required',
//            'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
//        ]);

        $campaign = Campaign::find($uuid);

        // Getting values from the blade template form
        $campaign->gross =  $request->get('gross');
        $campaign->net = $request->get('net');
        $campaign->vat = $request->get('vat');
        $campaign->bill_amount = $request->get('bill_amount');
        $campaign->received_amount = $request->get('received_amount');

        $campaign->save();
        return redirect()->route('billing.lists')->with('message','Bill has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campaign\CampaignBilling  $campaignBilling
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignBilling $campaignBilling)
    {
        //
    }
}
