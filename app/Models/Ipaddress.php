<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ipaddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'ipaddress',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
