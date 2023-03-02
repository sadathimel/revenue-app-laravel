<?php

namespace App\Http\Controllers;

use App\Models\campaign\Campaign;
use App\Models\campaign\DelayDate;
use App\Http\Requests\StoreDelayDateRequest;
use App\Http\Requests\UpdateDelayDateRequest;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DelayDateController extends Controller
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
     * @param  \App\Http\Requests\StoreDelayDateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDelayDateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\campaign\DelayDate  $delayDate
     * @return \Illuminate\Http\Response
     */
    public function show(DelayDate $delayDate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\campaign\DelayDate  $delayDate
     * @return \Illuminate\Http\Response
     */
    public function edit(DelayDate $delayDate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDelayDateRequest  $request
     * @param  \App\Models\campaign\DelayDate  $delayDate
     * @return \Illuminate\Http\Response
     */
    public function refreshData()
    {
        $campaigns = Campaign::all();


        $current = Carbon::now()->format('Y-m-d');

//        $ids = Campaign::pluck('id')->toArray();


//        Campaign::whereIn('id', $ids)
//            ->update([
//                'due' => DB::raw('bill_amount - received_amount'),
//                '0_to_59' => DB::raw(0),
//                '60_to_89' => DB::raw(0),
//                '90_to_119' => DB::raw(0),
//                '120_to_500' => DB::raw(0)
//            ]);


        foreach ($campaigns as $campaign)
        {
            $end = Carbon::parse($campaign->maturity_date);
            $days = $end->diffInDays($current);


            if ($days < 60 & $campaign->due != 0)
            {
                Campaign::where('id', $campaign->id)
                    ->where('due', '!=', 0)
                    ->update([
                        'day_0_to_59' => DB::raw($days),
                        'day_60_to_89' => DB::raw(0),
                        'day_90_to_119' => DB::raw(0),
                        'day_120_to_500' => DB::raw(0)
                    ]);
            }
            if ($days > 59 & $days < 90 & $campaign->due != 0)
            {
                Campaign::where('id', $campaign->id)
                    ->where('due', '!=', 0)
                    ->update([
                        'day_0_to_59' => DB::raw(0),
                        'day_60_to_89' => DB::raw($days),
                        'day_90_to_119' => DB::raw(0),
                        'day_120_to_500' => DB::raw(0)
                    ]);
            }
            if ($days > 89 & $days < 120 & $campaign->due != 0)
            {
                Campaign::where('id', $campaign->id)
                    ->where('due', '!=', 0)
                    ->update([
                        'day_0_to_59' => DB::raw(0),
                        'day_60_to_89' => DB::raw(),
                        'day_90_to_119' => DB::raw($days),
                        'day_120_to_500' => DB::raw(0)
                    ]);
            }
            if ($days > 119 & $campaign->due != 0)
            {
                Campaign::where('id', $campaign->id)
                    ->where('due', '!=', 0)
                    ->update([
                        'day_0_to_59' => DB::raw(0),
                        'day_60_to_89' => DB::raw(0),
                        'day_90_to_119' => DB::raw(0),
                        'day_120_to_500' => DB::raw($days)
                    ]);
            }
        }

        Toastr::success('Data refresh successfully!', 'Campaign', ["progressBar" => "true"]);
        return redirect()->route('campaign.lists')->with('message','Data refresh successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\campaign\DelayDate  $delayDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(DelayDate $delayDate)
    {
        //
    }
}
