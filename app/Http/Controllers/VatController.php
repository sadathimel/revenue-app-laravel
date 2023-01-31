<?php

namespace App\Http\Controllers;

use App\Models\Vat;
use App\Http\Requests\StoreVatRequest;
use App\Http\Requests\UpdateVatRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class VatController extends Controller
{
    public function index()
    {
        $vats = Vat::all();
        return view('pages.vat.index', compact('vats'));
    }

    public function update(Request $request, $id = 1)
    {
        $vat = Vat::find($id);
        $vat->value = $request->input('value');
        $vat->save();
        Toastr::success('Messages in here', 'Title', ["positionClass" => "toast-top-center"]);
        return redirect()->route('vat.index');
    }
}
