<?php

namespace App\Imports;

use App\Models\BillingSheet;
use App\Models\campaign\Campaign;
use App\Models\client\Client;
use App\Models\client\ClientType;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Row;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\ModelUpdated;
use Carbon\Carbon;


class BillingSheetImport implements ToModel, WithHeadingRow
{

    private $client_option;
    private $client_name;

    public function  __construct($client_option, $client_name)
    {
        $this->client_option= $client_option;
        $this->client_name= $client_name;
    }

    public function model(array $row)
    {

        if($row['campaign'] == null) {
            return null;
        }
        else
        {
                if ($row['agency_name'] ==  $this->client_name && !Campaign::where('bill_no',trim($row['bill_no']))->exists())
                {
                    return new Campaign([
                        'uuid' => Str::uuid(),
                        'client_id' => $this->client_option,
                        'title' => $row['campaign'],
                        'description' => $row['description'],
                        'year' => $row['year'],
                        'month' => date('n', strtotime($row['period'])),
                        'estimate_no' => $row['estimate_no'] ?? '',
                        'bill_no' => $row['bill_no'],
                        'bill_submission_date' => date('Y-m-d', strtotime($row['bill_submission_date_text'])) == '01-01-70' ? date('Y-m-d', strtotime('06-05-2010')) : date('Y-m-d', strtotime($row['bill_submission_date_text'])),
                        'pending_day' => ($row['pending_day']== '') ? 0 : $row['pending_day'],
                        'maturity_date' => date('d-m-y', strtotime($row['maturity_day_text'])) == '31-12-99' ? date('Y-m-d', strtotime('06-05-2010')) : date('Y-m-d', strtotime($row['maturity_day_text'])),
//                        'maturity_date'  => date('d-m-y', strtotime($row['maturity_day'])) == '31-12-99' ? date('Y-m-d', strtotime('06-05-2010')) : date('Y-m-d', strtotime($row['maturity_day'])),
                        'unbilled_amount' => ($row['unbilled_amount']== '') ? 0 : $row['unbilled_amount'],
                        'gross' => ($row['gross']== '') ? 0 : $row['gross'],
                        'net' => ($row['net']== '') ? 0 : $row['net'],
                        'vat' => ($row['vat']== '') ? 0 : $row['vat'],
                        'bill_amount' => ($row['bill_amount']== '') ? 0 : $row['bill_amount'],
                        'payment_status' => preg_replace('/[^A-Za-z0-9\-]/', '',$row['payment_status']),
                        'received_amount' => ($row['received_amount']== '') ? 0 : $row['received_amount'],
                        'chq_num' => ($row['chq_num']== '') ? 'BEFTN' : $row['chq_num'],
//                        'chq_num'  => $row['chq_num'],
                        'chq_rec_date' => date('d-m-y', strtotime($row['chq_rec_date_text'])) == '01-01-70' ? date('Y-m-d', strtotime('06-05-2010')) : date('Y-m-d', strtotime($row['chq_rec_date_text'])),
                        'cheque_amount' => ($row['cheque_amount']== '') ? 0 : $row['cheque_amount'],
                        'due' => (empty($row['due'])) ? 0 : $row['due'],
                        'day_0_to_59' => (empty($row['days_0_to_59'])) ? 0 : $row['days_0_to_59'],
                        'day_60_to_89' => (empty($row['days_60_to_89'])) ? 0 : $row['days_60_to_89'],
                        'day_90_to_119' => (empty($row['days_90_to_119'])) ? 0 : $row['days_90_to_119'],
                        'day_120_to_500' => (empty($row['days_120_to_500'])) ? 0 : $row['days_120_to_500'],
                        'created_by' => 1,
                        'updated_by' => 1,

                    ]);
                }
        }
    }

    public function batchSize(): int
    {
        return 100;
    }

    public function chunkSize(): int
    {
        return 100;
    }

}
