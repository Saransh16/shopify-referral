<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignParticipant extends Model
{
  protected $guarded = ['id'];

  protected $table = 'campaign_participant';    

  public function participants()
  {
      return $this->belongsTo('App\Models\Event');
  }  

  public function campaigns()
  {
    return $this->belongsTo('App\Models\Campaign');
  }
}
