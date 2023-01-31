<?php

namespace App\Models\client;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{

    use HasFactory;

    //  $guarded property to specify a black-list of attributes that are not mass assignable.
    protected $guarded = [
        'id',
    ];

    public function clientType()
    {
        return $this->belongsTo(ClientType::class);
    }
}
