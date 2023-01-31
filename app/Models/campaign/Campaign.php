<?php

namespace App\Models\campaign;

use App\Models\client\Client;
use App\Models\Month;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id'
    ];

    public function client()
    {
        return $this->hasOne(Client::class,'id','client_id');
    }

}
