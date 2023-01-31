<?php

namespace App\Models\client;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientType extends Model
{
    use HasFactory;

    //  $guarded property to specify a black-list of attributes that are not mass assignable.
    protected $guarded = [
        'id',
    ];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }
}
