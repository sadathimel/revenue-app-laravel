<?php

namespace App\Http\Controllers;

use App\Models\campaign\Campaign;
use App\Models\client\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::all();
        $clients = Client::all();
        $years = ['2021', '2023', '2023'];

        $results = DB::select('
            SELECT campaigns.client_id,
                    campaigns.year,
                    SUM(CASE WHEN months.name = "January" THEN campaigns.due ELSE 0 END) AS january,
                    SUM(CASE WHEN months.name = "February" THEN campaigns.due ELSE 0 END) AS february,
                    SUM(CASE WHEN months.name = "March" THEN campaigns.due ELSE 0 END) AS march,
                    SUM(CASE WHEN months.name = "April" THEN campaigns.due ELSE 0 END) AS april,
                    SUM(CASE WHEN months.name = "May" THEN campaigns.due ELSE 0 END) AS may,
                    SUM(CASE WHEN months.name = "June" THEN campaigns.due ELSE 0 END) AS june,
                    SUM(CASE WHEN months.name = "July" THEN campaigns.due ELSE 0 END) AS july,
                    SUM(CASE WHEN months.name = "August" THEN campaigns.due ELSE 0 END) AS august,
                    SUM(CASE WHEN months.name = "September" THEN campaigns.due ELSE 0 END) AS september,
                    SUM(CASE WHEN months.name = "October" THEN campaigns.due ELSE 0 END) AS october,
                    SUM(CASE WHEN months.name = "November" THEN campaigns.due ELSE 0 END) AS november,
                    SUM(CASE WHEN months.name = "December" THEN campaigns.due ELSE 0 END) AS december,
                    SUM(campaigns.due) as total_due,
                    SUM(campaigns.net) as total_net,
                    SUM(campaigns.received_amount) as received_amount
                FROM campaigns
                INNER JOIN clients ON campaigns.client_id = clients.id
                INNER JOIN months ON campaigns.month = months.id
                GROUP BY campaigns.client_id, campaigns.year
        ');

        return view('admin2.pages.report.billings', compact('campaigns','clients', 'years', 'results'));
    }

    // Fetch DataTable data
    public function getBillingsData()
    {
        $results = DB::select('
            SELECT campaigns.client_id,
                    campaigns.year,
                    SUM(CASE WHEN months.name = "January" THEN campaigns.due ELSE 0 END) AS january,
                    SUM(CASE WHEN months.name = "February" THEN campaigns.due ELSE 0 END) AS february,
                    SUM(CASE WHEN months.name = "March" THEN campaigns.due ELSE 0 END) AS march,
                    SUM(CASE WHEN months.name = "April" THEN campaigns.due ELSE 0 END) AS april,
                    SUM(CASE WHEN months.name = "May" THEN campaigns.due ELSE 0 END) AS may,
                    SUM(CASE WHEN months.name = "June" THEN campaigns.due ELSE 0 END) AS june,
                    SUM(CASE WHEN months.name = "July" THEN campaigns.due ELSE 0 END) AS july,
                    SUM(CASE WHEN months.name = "August" THEN campaigns.due ELSE 0 END) AS august,
                    SUM(CASE WHEN months.name = "September" THEN campaigns.due ELSE 0 END) AS september,
                    SUM(CASE WHEN months.name = "October" THEN campaigns.due ELSE 0 END) AS october,
                    SUM(CASE WHEN months.name = "November" THEN campaigns.due ELSE 0 END) AS november,
                    SUM(CASE WHEN months.name = "December" THEN campaigns.due ELSE 0 END) AS december,
                    SUM(campaigns.due) as total_due,
                    SUM(campaigns.net) as total_net,
                    SUM(campaigns.received_amount) as received_amount
FROM campaigns
INNER JOIN clients ON campaigns.client_id = clients.id
INNER JOIN months ON campaigns.month = months.id
GROUP BY campaigns.client_id, campaigns.year
        ');
        return response()->json($results);
    }
}
