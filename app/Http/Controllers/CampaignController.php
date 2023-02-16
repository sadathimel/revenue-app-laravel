<?php

namespace App\Http\Controllers;

use App\Models\campaign\Campaign;
use App\Http\Requests\UpdateCampaignRequest;
use App\Models\client\Client;
use App\Models\Vat;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller
{

    public function index()
    {
        $campaigns = Campaign::with('client')->get();
        
        $years = $campaigns->sortBy('year')->pluck('year')->unique();
        return view('admin2.pages.campaign.index', compact('campaigns', 'years'));
    }

    public function trash()
    {
        $campaigns = Campaign::onlyTrashed()->get();
        return view('admin2.pages.campaign.trash', compact('campaigns'));
    }

    public function removeAllFromTrash()
    {
        Campaign::onlyTrashed()->forceDelete();

        Toastr::success('All campaigns deleted from trash successfully', 'Campaign', ["progressBar" => "true"]);
        return redirect()->route('trash.campaigns')->with('success', 'All campaigns deleted from trash successfully');
    }


    public function create()
    {
        $clients = Client::all();
        $vat = Vat::where('id', 1)->first();
        return view('admin2.pages.campaign.create', compact('clients', 'vat'));
    }

    public function store(Request $request)
    {
//        $validatedData = $request->validate([
//            'uuid' => 'required',
//            'client_id' => 'required',
//            'title' => 'required|max:200',
//            'description' => 'required',
//            'year'  => 'required|date|date_format:Y',
//            'month' => 'required|numeric|between:1,12',
//            'estimate_no' => 'required',
//            'bill_no' => 'required',
//            'cheque_image' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
//        ],
//            [
//                'client_id.required'       =>   "The :attribute field is required",
//                'title.required'       =>   "The field is required",
//                'year.required'       =>   "The :attribute field is required",
//                'description.required'       =>   "The :attribute field is required",
//                'month.required'       =>   "The :attribute field is required",
//                'bill_no.required'       =>   "The :attribute field is required",
//                'estimate_no.required'       =>   "The :attribute field is required",
//                'cheque_image.image' => 'File should be an image',
//                'cheque_image.mimes' => 'File should be of jpeg,png,jpg,svg type',
//                'cheque_image.max' => 'File should not be larger than 3MB'
//
//            ]
//        );

//        $validate =  Validator::make($request->all(),$validatedData)->validate();
        // dd($request->all());
        $request->validate([
            'client_id' => 'required',
            'title' => 'required|max:200',
            'description' => 'required',
//            'year'  => 'required|date|date_format:Y',
            'month' => 'required|numeric|between:1,12',
            'estimate_no' => 'required',
            'bill_no' => 'required',
            'cheque_image' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
        ]);


        $campaign = new Campaign;

        $campaign->uuid = Str::uuid();

        $campaign->bill_submission_date = $request->input('bill_submission_date');
        $campaign->client_id = $request->input('client_id');
        $campaign->title = $request->input('title');
        $campaign->description = $request->input('description');
        $campaign->year = $request->input('year');
        $campaign->month = $request->input('month');
        $campaign->estimate_no = $request->input('estimate_no');
        $campaign->bill_no = $request->input('bill_no');
        $campaign->gross =  $request->input('gross');

        
        $campaign->client_commission_in =  $request->input('commissionPerc');
        $campaign->client_commission =  $request->input('commission');
        $campaign->net = $request->input('net');
        $campaign->vat = $request->input('vat');
        $campaign->vatd = $request->input('vatd');
        $campaign->commdiscount = $request->input('commdiscount');
        $campaign->discount = $request->input('discount');

        $campaign->bill_amount = $request->input('bill_amount');
        $campaign->received_amount = $request->input('received_amount');
        $campaign->due = $request->input('due');
        $campaign->chq_num = $request->input('chq_num');
        $campaign->cheque_amount = $request->input('cheque_amount');
        $campaign->chq_rec_date = $request->input('chq_rec_date');

        $campaign->vat_type =  (int) $request->input('vat_type');

        if ($request->hasFile('cheque_image')) {
            $imageName = time().'.'.$request->cheque_image->extension();
            $request->cheque_image->move(public_path('pp/images/cheque'), $imageName);
            $campaign->cheque_image = $imageName;
        }
        $campaign->created_by = 1;
        $campaign->updated_by = 1;

        if($campaign->save())
        {
            Toastr::success('Campaign and bill created successfully!', 'Campaign', ["progressBar" => "true"]);
            return redirect()->route('campaign.create')->with('success', 'Campaign created successfully');
        }else{
            Toastr::error('Something went wrong! Please check and resubmit.', 'Campaign', ["progressBar" => "true"]);
            redirect()->back();
        }



    }


    public function show(Campaign $campaign)
    {
 

        return view('admin2.pages.campaign.view', compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campaign\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        $campaign = Campaign::where('uuid', $uuid)->firstOrFail();
        $clients = Client::all();
        $vat = Vat::where('id', 1)->first();
        return view('admin2.pages.campaign.update', compact('campaign','clients','vat'));
    }


    public function update(Request $request, $uuid)
    {
        $request->validate([
            'client_id' => 'required',
            'title' => 'required|max:200',
            'description' => 'required',
//            'year'  => 'required|date|date_format:Y',
            'month' => 'required|numeric|between:1,12',
            'estimate_no' => 'required',
            'bill_no' => 'required',
            'cheque_image' => 'image|mimes:jpeg,png,jpg,svg|max:3072',
        ]);


        // $campaign = Campaign::find($uuid);
        $campaign = Campaign::where('uuid', $uuid)->firstOrFail();
        // dd($campaign);

        $campaign->bill_submission_date = $request->bill_submission_date;
        $campaign->client_id = $request->client_id;
        $campaign->title = $request->title;
        $campaign->description = $request->description;
        $campaign->year = $request->year;
        $campaign->month = $request->month;
        $campaign->estimate_no = $request->estimate_no;
        $campaign->bill_no = $request->bill_no;
        $campaign->gross =  $request->gross;
        $campaign->client_commission_in =  $request->commissionPerc;
        $campaign->client_commission =  $request->commission;

        $campaign->net = $request->net;
        $campaign->vat = $request->vat;
        $campaign->vatd = $request->vatd;
        $campaign->commdiscount = $request->commdiscount;
        $campaign->discount = $request->discount;



        $campaign->bill_amount = $request->bill_amount;
        $campaign->received_amount = $request->received_amount;
        $campaign->due = $request->due;
        $campaign->chq_num = $request->chq_num;
        $campaign->cheque_amount = $request->cheque_amount;
        $campaign->chq_rec_date = $request->chq_rec_date;
        $campaign->vat_type = $request->input('vat_type');

        if ($request->hasFile('cheque_image')) {
            $imageName = time().'.'.$request->cheque_image->extension();
            $request->cheque_image->move(public_path('pp/images/cheque'), $imageName);
            $campaign->cheque_image = $imageName;
        }
        $campaign->created_by = 1;
        $campaign->updated_by = 1;
        $campaign->save();

//        Toastr::success('Campaign updated successfully!', 'Campaign', ["progressBar" => "true"]);
//        return redirect()->route('campaign.create')->with('success', 'Campaign updated successfully');

        if($campaign->save())
        {
            Toastr::success('Campaign updated successfully!', 'Campaign', ["progressBar" => "true"]);
            return redirect()->route('campaign.lists')->with('success', 'Campaign updated successfully');
        }else{
            Toastr::error('Something went wrong! Please check and resubmit.', 'Campaign', ["progressBar" => "true"]);
            redirect()->back();
        }
    }



    public function destroy($id)
    {
        $campaign = Campaign::findOrFail($id);
        $campaign->delete();

        Toastr::warning('Campaign move to trash successfully', 'Campaign', ["progressBar" => "true"]);
        return redirect()->route('campaign.lists')->with('success', 'Campaign move to trash successfully');
    }

    public function suggestName(Request $request)
    {
        $query = request()->input('title');

        $campaign_names = Campaign::select("title")
            ->where('title', 'LIKE', '%'.$query.'%')
            ->pluck('title')
            ->toArray();
        return response()->json($campaign_names);
    }

    public function suggestDescription(Request $request)
    {
        $query = request()->input('description');

        $campaign_descriptions = Campaign::select("description")
            ->where('description', 'LIKE', '%'.$query.'%')
            ->pluck('description')
            ->toArray();
        return response()->json($campaign_descriptions);
    }

    public function suggestEstimateNumber(Request $request)
    {
        $query = request()->input('estimate_number');

        $campaign_estimate_no = Campaign::select("estimate_no")
            ->where('estimate_no', 'LIKE', '%'.$query.'%')
            ->pluck('estimate_no')
            ->toArray();
        return response()->json($campaign_estimate_no);
    }

    public function suggestBillNumber(Request $request)
    {
        $query = request()->input('bill_number');

        $campaign_bill_no = Campaign::select("bill_no")
            ->where('bill_no', 'LIKE', '%'.$query.'%')
            ->pluck('bill_no')
            ->toArray();
        return response()->json($campaign_bill_no);
    }

    public function getCommissionValue(Request $request)
    {
//        $query = request()->input('query');

        $selectedOption = $request->input('client_id');
        $value = Client::where('id', $selectedOption)
            ->value('commission');
        return $value;

    }

    public function ajax()
    {
        $campaign = Campaign::all();
        $year = $campaign->sortBy('year')->pluck('year')->unique();
    }
}
