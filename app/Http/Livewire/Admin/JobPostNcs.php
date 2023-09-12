<?php

namespace App\Http\Livewire\Admin;

use App\Models\IndustryNcs;
use Livewire\Component;
use Livewire\Redirect;
use App\Models\JobPost as ModelsJobPost;
use Illuminate\Support\Facades\Auth;
use App\Models\JobFile;
use App\Models\JobNatureCodeNcs;
use App\Models\MinQualificationNcs;
// use App\Models\NcsJobDispatch;
use App\Models\SectorNcs;
use phpseclib3\Crypt\TripleDES;
use App\Models\NcsJobDispatch;
use App\Models\District;
use App\Models\State;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\NcoFamily;

class JobPostNcs extends Component
{

    public $States;
    public $Districts = [];

    public $ncoOccupation;

    public $State;
    public $District;

    public $description;
    public $sectors;
    public $industries;
    public $jobNatures;
    public $minqualifications;


    public $SectorID;
    public $IndustryID;
    public $JobNatureCode;
    public $MinQualificationID;

    public $JobReferenceID;

    public $JobTitle;
    public $NumberofOpenings;
    public $ContactPersonName;
    public $ContactMobile;
    public $KeySkills=[];
    public $JobPostExpiryDate;
    public $PostedForEmployer;
    public $JobDescription;

    public $apiResponse;

    public function mount()
    {
        $this->States = State::get();
        // $this->District=District::where('state_id')->get();;

        // Fetch the data from your model
        $this->sectors = SectorNcs::get();
        $this->industries = IndustryNcs::get();
        $this->jobNatures = JobNatureCodeNcs::get();
        $this->minqualifications = MinQualificationNcs::get();
    }
    public function updatedState($id)
    {
        if ($id != null) {
            $this->Districts = District::where('state_id', $id)->get();
            // $this->State = $id;
        }
    }

    public function submit()
    {

        $keySkillsArray = [];
        foreach ($this->KeySkills as $skill) {
            $keySkillsArray[] = ['Skill' => $skill];
        }
        // $firstSkill = $this->KeySkills[0]['Skill'];
        // $this->validate(NcsJobDispatch::rules());
        // $keySkills = json_decode($request->input('Keyskills'));
        $details = new NcsJobDispatch;
        $details->JobReferenceID    = $this->JobReferenceID;
        $details->JobTitle =          $this->JobTitle;
        $details->SectorID          = $this->SectorID;
        $details->IndustryID          = $this->IndustryID;
        $details->JobDescription          = $this->JobDescription;
        $details->JobNatureCode          = $this->JobNatureCode;
        $details->NumberofOpenings          = $this->NumberofOpenings;
        $details->MinQualificationID          = $this->MinQualificationID;
        $details->ContactPersonName          = $this->ContactPersonName;
        $details->ContactMobile          = $this->ContactMobile;
        $details->KeySkills          = $this->KeySkills;
        // $details->KeySkills = $this->KeySkills;
        $details->JobPostExpiryDate          = $this->JobPostExpiryDate;
        $details->PostedForEmployer          = $this->PostedForEmployer;
        // $details->state_id          = $this->State;
        // $details->district_id          = $this->District;
        $details->save();

        // dd($details);

        try {
            
            $apiData=[
                [
                        
                    "JobReferenceID" => $this->JobReferenceID,
                    "JobTitle" => $this->JobTitle,
                    "JobDescription" => $this->JobDescription,
                    "JobNatureCode" => $this->JobNatureCode,
                    "SectorID" => $this->SectorID,
                    "IndustryID" => $this->IndustryID,
                    "NumberofOpenings" => $this->NumberofOpenings,
                    "MinQualificationID" => $this->MinQualificationID,
                    "ContactPersonName" => $this->ContactPersonName,
                    "ContactMobile" => $this->ContactMobile,
                    "KeySkills" => $keySkillsArray , // Deserialize KeySkills array
                    "JobPostExpiryDate" => $this->JobPostExpiryDate,
                    "PostedForEmployer" => $this->PostedForEmployer,
                    // "JobLocations" => [
                    //     [
                    //         "CityID" => $this->District,
                    //         "StateID" => $this->State

                    //     ]
                    // ],
                    "ApplyJobUrl" => "https://dev.abc.co.in:8090/jobs/wiseyatra-rdight-holiday-technologies-pvt-ltd-content-writer-jobs-for-freshers-in-new-delhi-4958?from=ncs",
                ]
            ];
            


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
            // dd($authResponse);
            $ncsAuthUser = json_decode($authResponse->body(), true);
            if ($authResponse->ok()) {

                $ncsAuthUser = json_decode($authResponse->body(), true);
                // NcsJobDispatch::all();
                $response =  Http::withHeaders([

                    'Cookie' => $ncsAuthUser['AuthenticateUserResult']['Cookie'],
                    // 'Accept' => 'application/json'

                ])->post(
                    'https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/PostNewJobs',$apiData);
                    // dd($response);
                    // return json_decode($response->body());
            //     if ($response->successful()) {
            //         // Success - you can return a success message if needed
            //         session()->flash('success', 'Job posted successfully');
                    return redirect()->route('jobsPostNcs');
            //     } else {
            //         $responseBody = json_decode($response->body());
            //         if (isset($responseBody->Results[0]->FaultText)) {
            //             $errorMessage = $responseBody->Results[0]->FaultText;
            //         } else {
            //             // If there's no specific error message, provide a generic one
            //             $errorMessage = 'An error occurred while posting the job. Please try again later.';
            //         }
            //         // Handle API error and log it
            //         Log::error('Error posting job to external API: ' . $errorMessage);

            //         // Return a user-friendly error message
            //         return response()->json(['error' => $errorMessage], 500);
            //     }
            // }
            }
        } catch (\Exception $e) {
            // Handle any other exceptions that may occur
            Log::error('An unexpected error occurred: ' . $e->getMessage());

            // Return a generic error message
            return response()->json(['error' => 'An unexpected error occurred. Please try again later.'], 500);
        }
    }

    public function cancel()
    {
        return redirect(route('jobsPostNcs'));
    }


    public function render()
    {
        return view('livewire.admin.job-post-ncs');
    }
}
