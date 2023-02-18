<?php

namespace App\Http\Controllers;

use App\Models\campaign\Campaign;
use App\Models\client\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $title = $request->get('title');
        $campaigns = Campaign::all();
        $clients = Client::all();
//        $years = ['2021', '2022', '2023'];

        $results = DB::table('clients')
            ->leftJoin('campaigns', 'clients.id', '=', 'campaigns.client_id')
            ->select('clients.name', 'campaigns.year',
                DB::raw('SUM(CASE WHEN campaigns.month = 1 THEN campaigns.received_amount END) AS january'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS february'),
                DB::raw('SUM(CASE WHEN campaigns.month = 3 THEN campaigns.received_amount END) AS march'),
                DB::raw('SUM(CASE WHEN campaigns.month = 4 THEN campaigns.received_amount END) AS april'),
                DB::raw('SUM(CASE WHEN campaigns.month = 5 THEN campaigns.received_amount END) AS may'),
                DB::raw('SUM(CASE WHEN campaigns.month = 6 THEN campaigns.received_amount END) AS june'),
                DB::raw('SUM(CASE WHEN campaigns.month = 7 THEN campaigns.received_amount END) AS july'),
                DB::raw('SUM(CASE WHEN campaigns.month = 8 THEN campaigns.received_amount END) AS august'),
                DB::raw('SUM(CASE WHEN campaigns.month = 9 THEN campaigns.received_amount END) AS september'),
                DB::raw('SUM(CASE WHEN campaigns.month = 10 THEN campaigns.received_amount END) AS october'),
                DB::raw('SUM(CASE WHEN campaigns.month = 11 THEN campaigns.received_amount END) AS november'),
                DB::raw('SUM(CASE WHEN campaigns.month = 12 THEN campaigns.received_amount END) AS december'),
                DB::raw('SUM(campaigns.bill_amount) AS total_bill_amount'),
                DB::raw('SUM(campaigns.net) AS total_net_amount'),
                DB::raw('SUM(campaigns.received_amount) AS total_received_amount'),
                DB::raw('(SUM(campaigns.day_0_to_59) + SUM(campaigns.day_60_to_89) + SUM(campaigns.	day_90_to_119) + SUM(campaigns.day_120_to_500))  AS total_matured_amount'),
                DB::raw('SUM(campaigns.unbilled_amount) AS total_unbilled_amount'),
                DB::raw('SUM(campaigns.client_commission) AS total_client_commission'),
                DB::raw('SUM(campaigns.due) AS due'),
            )
            ->groupBy('clients.name', 'campaigns.year')
            ->orderBy('clients.id', 'asc')->orderBy('campaigns.year', 'asc');

        if ($title) {
            $results = $results->where('clients.name', $title);
        }

        $results = $results->get();
        $clients_name = $clients->pluck('name');
        $years = $results->pluck('year')->filter()->unique()->values()->sort()->toArray();

//        return $years;


        return view('admin2.pages.report.billings', compact('campaigns','clients_name', 'years', 'results', 'title'));
    }

    // Fetch DataTable data
    public function getBillingsData(Request $request)
    {
        $title = $request->get('title');
        $campaigns = Campaign::all();
        $clients = Client::all();
        $years = ['2021', '2023', '2023'];

        $results = DB::table('clients')
            ->leftJoin('campaigns', 'clients.id', '=', 'campaigns.client_id')
            ->select('clients.name', 'campaigns.year',
                DB::raw('SUM(CASE WHEN campaigns.month = 1 THEN campaigns.received_amount END) AS january'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS february'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS march'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS april'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS may'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS june'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS july'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS august'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS september'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS october'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS november'),
                DB::raw('SUM(CASE WHEN campaigns.month = 2 THEN campaigns.received_amount END) AS december'),
                DB::raw('SUM(campaigns.bill_amount) AS total_bill_amount'),
                DB::raw('SUM(campaigns.net) AS total_net_amount'),
                DB::raw('SUM(campaigns.received_amount) AS total_received_amount')
            )
            ->groupBy('clients.name', 'campaigns.year')
            ->orderBy('clients.id', 'asc')->orderBy('campaigns.year', 'asc')
            ->get();

        if ($title) {
            $results = $results->where('clients.name', $title);
        }

        $clients_name = $results->unique('name')->pluck('name');
        $results = $results->get();
        return $results;
//        return response()->json($results);
    }
}
