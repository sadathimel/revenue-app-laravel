<?php

namespace App\Http\Controllers;

use App\Models\campaign\Campaign;
use App\Models\campaign\CampaignBilling;
use App\Models\client\Client;
use App\Models\Vat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function topCards() {
        $vat = Vat::where('id', '=', '1')->value('value');
        $total_client = Client::count();
        $total_campaign = Campaign::count();
        $total_billing = 10;
        // $total_billing = CampaignBilling::count();
        //return $vat;
        $campaignes = Campaign::all();
        return view('admin2.pages.home', compact('vat', 'total_client', 'total_campaign', 'total_billing','campaignes' ));
    }
}
