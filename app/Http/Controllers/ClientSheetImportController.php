<?php

namespace App\Http\Controllers;

use App\Imports\ClientSheetImport;
use App\Models\client\ClientType;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class ClientSheetImportController extends Controller
{
    public function import()
    {
        //return 'ok';
        $client_types = ClientType::all();
        return view('admin2.pages.client.bulk-import', compact('client_types'));
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'import_file'  => 'required|mimes:xls,xlsx'
        ]);

        $client_type_option = $request->input('client_type_option');
        Excel::import(new ClientSheetImport($client_type_option), $request->file('import_file'));
        Toastr::success('Data Imported Successfully', 'Client', ["progressBar" => "true"]);
        return redirect()->route('client.lists')->with('message','Data Imported Successfully');
    }
}
