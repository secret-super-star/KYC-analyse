<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'address',
        'DOB',
        'phone',
        'sex',
        'line_id',
        'facebook_id',
        'twitter_id',
        'telegram_id',
        'youtube_id',
        'documenttype_id',
        'documents',
        'ipaddress',
        'category_id',
        'note',
        'labels',
    ];

    public function documenttype()
    {
        return $this->belongsTo('App\Models\Documenttype');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
