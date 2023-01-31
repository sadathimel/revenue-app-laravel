<?php

namespace App\Http\Controllers;

use App\Imports\BillingSheetImport;
use App\Models\client\Client;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
//use Maatwebsite\Excel\Excel;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class BillingSheetImportController extends Controller
{
    public function import()
    {
        //return 'ok';
        $clients = Client::all();
        return view('admin2.pages.campaign.bulk-import', compact('clients'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'import_file'  => 'required|mimes:xls,xlsx'
        ]);

        $client_option = $request->input('client_option');
        $client_name = Client::where('id', $client_option)->first()->name;
        Excel::import(new BillingSheetImport($client_option, $client_name), $request->file('import_file'));
        Toastr::success('Data loaded Successfully', 'Campaign', ["progressBar" => "true"]);
        return redirect()->route('billing.sheet.import')->with('message','Data loaded Successfully');
    }
}
