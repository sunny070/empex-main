<?php

namespace App\Http\Livewire\Admin;

use App\Models\IndustryNcs;
use Livewire\Component;
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


class JobPostNcs extends Component
{

    public $States;
    public $Districts=[];

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
    public $KeySkills;
    public $JobPostExpiryDate;
    public $PostedForEmployer;
    public $JobDescription;

    public function mount()
    {   
        $this->States=State::get();
        // $this->District=District::where('state_id')->get();;

        // Fetch the data from your model
        $this->sectors = SectorNcs::get();
        $this->industries = IndustryNcs::get();
        $this->jobNatures = JobNatureCodeNcs::get();
        $this->minqualifications = MinQualificationNcs::get();

        // $this->jobDispatches = NcsJobDispatch::with('sector', 'industry', 'jobNature', 'minQualification')->get();
    }
    public function updatedState($id)
    {
        if ($id != null) {
            $this->Districts = District::where('state_id', $id)->get();
        }
    }

    public function submit()
    {
        // dd($this->JobReferenceID);
        // $this->validate(
        //     [
        //         'JobReferenceID'=>'required',
        //         'JobTitle'=>'required',
        //         'SectorID'=>'required',
        //         'IndustryID'=>'required',
        //         'NumberofOpenings'=>'required',
        //         'ContactPersonName'=>'required',
        //         'ContactMobile'=>'required|max:10',
        //         'KeySkills'=>'required',
        //         'JobReferenceID'=>'required',
        //         'JobPostExpiryDate'=>'required',

        //     ]
        //     );

        $details =new NcsJobDispatch;
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
        $details->JobPostExpiryDate          = $this->JobPostExpiryDate;
        $details->PostedForEmployer          = $this->PostedForEmployer;
        $details->state_id          = $this->State;
        $details->district_id          = $this->District;




        // $details->JobDescription          = $request->input('JobDescription');
        // $details->JobDescription          = $request->input('JobDescription');

        // $details->MinExperienceYear          = $request->input('MinExperienceYear');
        // $details->MaxExperienceYear          = $request->input('MaxExperienceYear');
        // $details->MinExpectedSalary          = $request->input('MinExpectedSalary');
        // $details->MaxExpectedSalary          = $request->input('MaxExpectedSalary');
        // $details->SalaryType          = $request->input('SalaryType');
        // $details->MinAge          = $request->input('MinAge');
        // $details->MaxAge          = $request->input('MaxAge');
        // $details->GenderCode          = $request->input('GenderCode');
        // $details->NumberofOpenings          = $request->input('NumberofOpenings');
        // $details->ContactPersonName          = $request->input('ContactPersonName');
        // $details->ContactMobile          = $request->input('ContactMobile');
        // $details->ContactEmail          = $request->input('ContactEmail');
        // $details->IsToDisplayContactInformation          = $request->input('IsToDisplayContactInformation');

        // $details->KeySkills          = $request->input('KeySkills');

        // $details->IsToDisplayEmailIdOfEmployer          = $request->input('IsToDisplayEmailIdOfEmployer');
        // $details->IsToDisplayMobileOfEmployer          = $request->input('IsToDisplayMobileOfEmployer');


        // $details->Keyskills          =     $request->input('Keyskills');
        // $details->JobPostExpiryDate          = $request->input('JobPostExpiryDate');
        // $details->UGQualificationID          = $request->input('UGQualificationID');
        // $details->UGSpecializationID          = $request->input('UGSpecializationID');
        // $details->UGYearFrom          = $request->input('UGYearFrom');
        // $details->UGYearTo          = $request->input('UGYearTo');
        // $details->PGQualificationID          = $request->input('PGQualificationID');
        // $details->PGSpecializationID          = $request->input('PGSpecializationID');
        // $details->PGYearFrom          = $request->input('PGYearFrom');
        // $details->PGYearTo          = $request->input('PGYearTo');
        // $details->PHDQualificationID          = $request->input('PHDQualificationID');
        // $details->PHDSpecializationID          = $request->input('PHDSpecializationID');
        // $details->PHDYearFrom          = $request->input('PHDYearFrom');
        // $details->PHDYearTo          = $request->input('PHDYearTo');
        // $details->IsToDisplayEmployerName          = $request->input('IsToDisplayEmployerName');
        // $details->CasteCode          = $request->input('CasteCode');
        // $details->IsForExServicemen          = $request->input('IsForExServicemen');
        // $details->IsForDisabled          = $request->input('IsForDisabled');
        // $details->DisabilityID          = $request->input('DisabilityID');
        // $details->PartFullTimeType          = $request->input('PartFullTimeType');
        // $details->FunctionalAreaID          = $request->input('FunctionalAreaID');
        // $details->FunctionalRoleID          = $request->input('FunctionalRoleID');

// dd($details);
        $details->save();


        if($details){

            $tripleDes = new TripleDES('ecb');
            $tripleDes->setKey(md5('DGET_8D1087A1D4BF', true));
            $tripleDes->enablePadding();
    
            $authResponse = Http::post('https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/AuthenticateUser', [
                // 'strUserName' => base64_encode($tripleDes->encrypt(env('NCS_USERNAME'))),
                'strUserName' => env('ENCRYPTED_USERNAME'),
                // 'strPassword' => base64_encode($tripleDes->encrypt(env('NCS_PASSWORD'))),
                'strPassword' => env('ENCRYPTED_PASSWORD'),
            ]);
    
            // return $authResponse->json();
    
            $ncsAuthUser = json_decode($authResponse->body(), true);
    
            // return $ncsAuthUser['AuthenticateUserResult']['Cookie'];
    
    
    
            if ($authResponse->ok()) {
    
                $ncsAuthUser = json_decode($authResponse->body(), true);
    
                // 
    
                // dd("sunny");
    
                $response =  Http::withHeaders([
    
                    'Cookie' => $ncsAuthUser['AuthenticateUserResult']['Cookie'],
                    'Accept' => 'application/json'
    
                ])->post(
                    'https://spstaging.ncs.gov.in/_vti_bin/NCSPartners/NCSPServiceExternal.svc/PostNewJobs',
                    [   $details = new NcsJobDispatch,
                        "JobReferenceID" =>$details->JobReferenceID ,
                        "JobTitle" => $details->JobTitle ,
                        "JobDescription" =>$details->JobDescription ,
                        "JobNatureCode" => $details->JobNatureCode        ,
                        "SectorID" => $details->SectorID          ,
                        "IndustryID" => $details->IndustryID          ,
                        "NumberofOpenings" =>$details->NumberofOpenings,
                        "MinQualificationID" =>$details->MinQualificationID,
                        "ContactPersonName" =>$details->ContactPersonName,
                        "ContactMobile" =>$details->ContactMobile,
                        "Keyskills" =>$details->Keyskills   ,
                        "JobPostExpiryDate" =>$details->JobPostExpiryDate,
                        "PostedForEmployer" =>$details->PostedForEmployer,
                        "ApplyJobUrl" => "https://dev.abc.co.in:8090/jobs/wiseyatra-rdight-holiday-technologies-pvt-ltd-content-writer-jobs-for-freshers-in-new-delhi-4958?from=ncs",
                        // "MinExperienceYear" =>$details->MinExperienceYear          ,
                        // "MaxExperienceYear" =>$details->MaxExperienceYear         ,
                        // "MinExpectedSalary" =>$details->MinExpectedSalary         ,
                        // "MaxExpectedSalary" =>$details->MaxExpectedSalary          ,
                        // "SalaryType" =>$details->SalaryType         ,
                        // "MinAge" =>$details->MinAge,
                        // "MaxAge" =>$details->MaxAge,
                        // "GenderCode" =>$details->GenderCode ,
                        // "ContactEmail" =>$details->ContactEmail,
                        // "IsToDisplayContactInformation" =>$details->IsToDisplayContactInformation,
                        // "IsToDisplayMobileOfEmployer" =>$details->IsToDisplayMobileOfEmployer,
                        // "IsToDisplayEmailIdOfEmployer" => $details->IsToDisplayEmailIdOfEmployer,
                        // "UGQualificationID" =>$details->UGQualificationID,
                        // "UGSpecializationID" =>$details->UGSpecializationID,
                        // "UGYearFrom" =>$details->UGYearFrom,
                        // "UGYearTo" =>$details->UGYearTo,
                        // "PGQualificationID" => $details->PGQualificationID,
                        // "PGSpecializationID" =>$details->PGSpecializationID,
                        // "PGYearFrom" => $details->PGYearFrom,
                        // "PGYearTo" =>$details->PGYearTo,
                        // "PHDQualificationID" =>$details->PHDQualificationID,
                        // "PHDSpecializationID" =>$details->PHDSpecializationID,
                        // "PHDYearFrom" =>$details->PHDYearFrom,
                        // "PHDYearTo" => $details->PHDYearTo,
                        // "JobLocations" =>$details->JobLocations,
                        // "FunctionalAreaID" =>$details->FunctionalAreaID,
                        // "FunctionalRoleID" =>$details->FunctionalRoleID,
                        // $details->save(),
                        // dd($details)
                    ]
                );
    
                return $response->body();
    
                // dd($response->body());
            }
        }
        // return $result;
        // dd($details);
        // return redirect()->route('jobsPostNcs')->with('success', 'Category Successfully created');

        // return $details;


        // if (env('APP_ENV') == 'local') {
        //     return;
        // }

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
