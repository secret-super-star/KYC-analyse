<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password',
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

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
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
