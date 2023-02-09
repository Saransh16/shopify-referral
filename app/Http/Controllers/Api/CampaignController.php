<?php

namespace App\Http\Controllers\Api;

use App\Models\Campaign;
use App\Http\Controllers\Controller;
use App\Validators\CampaignValidator;
use Mail;
use App\Mail\SendParticipateLink;

class CampaignController extends Controller
{

  public function __construct(CampaignValidator $validator)
  {
    $this->validator = $validator;
  }

  public function create()
  {
    $inputs = request()->all();

    $this->validator->fire($inputs, 'create');

    if(!carbon()->parse($inputs['end_date'])->gt(carbon()->parse($inputs['start_date']))) 

    return response()->error('End date and time should be greater.');

    $campaign = Campaign::create([
      'user_id' => auth()->user()->id,
      'title' => $inputs['title'],
      'description' => $inputs['description'],
      'domain' => $inputs['domain'],
      'start_date' => $inputs['start_date'],
      'end_date' => $inputs['end_date'],
      'rules' => json_encode($inputs['rules'])
    ]);

    return response()->success($campaign);
  }

  public function show($id)
  {
    $campaign = Campaign::find($id);

    if(!$campaign) return response()->error('Campaign does not exist');

    return response()->success($campaign);
  }


  public function sendParticipateLink($id)
  {
    $campaign = Campaign::find($id);

    $campaign['link'] = 'http://localhost:3000/participate/'.$id;

  }

}