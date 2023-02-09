<?php

namespace App\Http\Controllers\Api;

use App\Models\Participant;
use App\Http\Controllers\Controller;
use App\Validators\ParticipantValidator;
use App\Models\Campaign;
use App\Models\CampaignParticipant;

class ParticipantController extends Controller
{

  public function __construct(ParticipantValidator $validator)
  {
    $this->validator = $validator;
  }

  public function create()
  {
    $inputs = request()->all();

    $this->validator->fire($inputs, 'create');

    $participant = Participant::create([
      'name' => $inputs['name'],
      'email' => $inputs['email'],
    ]);

    return response()->success($participant);
  }

  public function joinCampaign($id)
  {

    $participant = $this->create();

    $participant = json_decode($participant->content());

    $campaign = Campaign::find($id);

    $campaign_participant = CampaignParticipant::create([

      'campaign_id' => $campaign->id,
      'participant_id' => $participant->data->id

    ]);

    return response()->success('Campaign Joined Successfully.');
    
  }

}