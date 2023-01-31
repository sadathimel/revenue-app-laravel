<?php

namespace App\Imports;

use App\Models\client\Client;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class ClientSheetImport implements ToModel, WithHeadingRow, SkipsEmptyRows
{
    private $client_type_option;

    public function  __construct($client_type_option)
    {
        $this->client_type_option= $client_type_option;
    }

    public function model(array $row)
    {
        if($row['agency_name'] == null) {
            return null;
        }
        else
        {
            if(!Client::where('name',$row['agency_name'])->exists()){
                return new Client([
                    'uuid' => Str::uuid(),
                    'client_type_id' => $this->client_type_option,
                    'name'  => $row['agency_name'],
                    'created_by' => 1,
                    'updated_by' => 1,

                ]);
            }
        }

    }
}
