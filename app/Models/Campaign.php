<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use SoftDeletes;

    // protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'domain',
        'start_date',
        'end_date',
        'rules'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];    

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function participants()
    {
        return $this->belongsToMany('App\Models\Participant')->withTimestamps();
    }
}
