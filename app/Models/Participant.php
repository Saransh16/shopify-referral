<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    protected $fillable = [
        'email',
        'name'
    ];

    public function campaigns()
    {
        return $this->belongsToMany('App\Models\Campaign')->withTimestamps();
    }

    public function campaignParticipants()
    {
        return $this->hasMany('App\Models\CampaignParticipant'); 
    }    

}
