<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpseclib3\Crypt\TripleDES;
use App\Models\NcsJobDispatch;
//Added

use App\Models\JobPost as ModelsJobPost;
use App\Models\JobFile;
use Illuminate\Support\Facades\Auth;
use App\Models\JobNco;
// use Illuminate\Http\Request;
use App\Models\IndustryNcs;
// use App\Models\JobPost as ModelsJobPost;
// use Illuminate\Support\Facades\Auth;
// use App\Models\JobFile;
use App\Models\JobNatureCodeNcs;
use App\Models\MinQualificationNcs;
use App\Models\SectorNcs;
// use phpseclib3\Crypt\TripleDES;
// use App\Models\NcsJobDispatch;
use App\Models\District;
use App\Models\State;
// use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\NcoFamily;

class NcsJobDispatchController extends Controller
{
  public $Districts;

  public function create(State $id)
  {
    // Fetch necessary data for your view

    // $this->State = $id;

    // $districts=District::where('state_id', $id)->get();
    $Districts = District::get();
    $states = State::get();
    $sectors = SectorNcs::get();
    $industries = IndustryNcs::get();
    $jobNatures = JobNatureCodeNcs::get();
    $minqualifications = MinQualificationNcs::get();

    return view('admin.createJobPostNcs', [
      'states' => $states,
      'sectors' => $sectors,
      'industries' => $industries,
      'jobNatures' => $jobNatures,
      'minqualifications' => $minqualifications,
      'districts' => $Districts
    ]);
  }



  public function submitNCS(Request $request)
  {
    $keySkills = json_decode($request->input('Keyskills'));
    $jobPost = new NcsJobDispatch;
    $jobPost->JobReferenceID    = $request->input('JobReferenceID');;
    $jobPost->JobTitle = $request->input('JobTitle');
    $jobPost->SectorID          = $request->input('SectorID');
    $jobPost->IndustryID          = $request->input('IndustryID');
    $jobPost->JobDescription          = $request->input('JobDescription');
    $jobPost->JobNatureCode          = $request->input('JobNatureCode');
    $jobPost->NumberofOpenings          = $request->input('NumberofOpenings');
    $jobPost->MinQualificationID          = $request->input('MinQualificationID');
    $jobPost->ContactPersonName          = $request->input('ContactPersonName');
    $jobPost->ContactMobile          = $request->input('ContactMobile');
    $jobPost->KeySkills = json_encode($keySkills);
    $jobPost->JobPostExpiryDate          = $request->input('JobPostExpiryDate');
    $jobPost->PostedForEmployer          = $request->input('PostedForEmployer');
    $jobPost->state_id = $request->input('State');
    $jobPost->district_id = $request->input('District');
    $jobPost->save();
    try {

      $apiData = [
        [

          "JobReferenceID" => $jobPost->JobReferenceID,
          "JobTitle" => $jobPost->JobTitle,
          "JobDescription" => $jobPost->JobDescription,
          "JobNatureCode" => $jobPost->JobNatureCode,
          "SectorID" => $jobPost->SectorID,
          "IndustryID" => $jobPost->IndustryID,
          "NumberofOpenings" => $jobPost->NumberofOpenings,
          "MinQualificationID" => $jobPost->MinQualificationID,
          "ContactPersonName" => $jobPost->ContactPersonName,
          "ContactMobile" => $jobPost->ContactMobile,
          "KeySkills" => [
            'Skill' =>
            $jobPost->KeySkills,
            'Skill' =>
            $jobPost->KeySkills,


          ], // Deserialize KeySkills array
          "JobPostExpiryDate" => $jobPost->JobPostExpiryDate,
          "PostedForEmployer" => $jobPost->PostedForEmployer,
          "JobLocations" => [
            [
              "CityID" => $jobPost->District,
              "StateID" => $jobPost->State

            ]
          ],
          "ApplyJobUrl" => "https://dev.abc.co.in:8090/jobs/wiseyatra-rdight-holiday-technologies-pvt-ltd-content-writer-jobs-for-freshers-in-new-delhi-4958?from=ncs",
        ]
      ];
      // dd($apiData);


      $tripleDes = new TripleDES('ecb');
      $tripleDes->setKey(md5('DGET_8D1087A1D4BF', true));
      $tripleDes->enablePadding();

      $authResponse = Http::post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/AuthenticateUser', [
        // 'strUserName' => base64_encode($tripleDes->encrypt(env('NCS_USERNAME'))),
        'strUserName' => env('ENCRYPTED_USERNAME'),
        // 'strPassword' => base64_encode($tripleDes->encrypt(env('NCS_PASSWORD'))),
        'strPassword' => env('ENCRYPTED_PASSWORD'),
      ]);
      Log::info('Authentication Response:', [
        'status_code' => $authResponse->status(),
        'response_body' => $authResponse->body(),
      ]);
      dd($authResponse);
      $ncsAuthUser = json_decode($authResponse->body(), true);
      if ($authResponse->ok()) {

        $ncsAuthUser = json_decode($authResponse->body(), true);
        // NcsJobDispatch::all();
        $response =  Http::withHeaders([

          'Cookie' => $ncsAuthUser['AuthenticateUserResult']['Cookie'],
          // 'Accept' => 'application/json'

        ])->post(
          'https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/PostNewJobs',$apiData);

        return json_decode($response->body());
      }
    } catch (\Exception $e) {
      // Handle any other exceptions that may occur
      Log::error('An unexpected error occurred: ' . $e->getMessage());

      // Return a generic error message
      return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
    }
  }
}
