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
use Illuminate\Support\Facades\Http;


class JobPostNcs extends Component
{

    public $sectors;
    public $industries;
    public $jobNatures;
    public $minqualifications;
    public $SectorID;
    public $IndustryID;
    public $JobNatureCode;
    public $MinQualificationID;


    public function mount()
    {
        // Fetch the data from your model
        $this->sectors =SectorNcs::get();
        $this->industries =IndustryNcs::get();
        $this->jobNatures =JobNatureCodeNcs::get();
        $this->minqualifications =MinQualificationNcs::get();
        
        // $this->jobDispatches = NcsJobDispatch::with('sector', 'industry', 'jobNature', 'minQualification')->get();
    }

    public function submit()
    {   
        
        $details = new NcsJobDispatch;
        // $details->JobReferenceID    = $request->input('JobReferenceID');
        // $details->JobTitle =          $request->input('JobTitle');
        $details->SectorID          = $this->SectorID;
        $details->IndustryID          = $this->IndustryID;
        // $details->JobDescription          = $request->input('JobDescription');
        
        // $details->JobDescription          = $request->input('JobDescription');
        // $details->JobDescription          = $request->input('JobDescription');

        // $details->MinExperienceYear          = $request->input('MinExperienceYear');
        // $details->MaxExperienceYear          = $request->input('MaxExperienceYear');
        // $details->MinExpectedSalary          = $request->input('MinExpectedSalary');
        // $details->MaxExpectedSalary          = $request->input('MaxExpectedSalary');
        // $details->SalaryType          = $request->input('SalaryType');
        $details->JobNatureCode          = $this->JobNatureCode;
        // $details->MinAge          = $request->input('MinAge');
        // $details->MaxAge          = $request->input('MaxAge');
        // $details->GenderCode          = $request->input('GenderCode');
        // $details->NumberofOpenings          = $request->input('NumberofOpenings');
        $details->MinQualificationID          = $this->MinQualificationID;
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
        // $details->PostedForEmployer          = $request->input('PostedForEmployer');
        // $details->IsToDisplayEmployerName          = $request->input('IsToDisplayEmployerName');
        // $details->CasteCode          = $request->input('CasteCode');
        // $details->IsForExServicemen          = $request->input('IsForExServicemen');
        // $details->IsForDisabled          = $request->input('IsForDisabled');
        // $details->DisabilityID          = $request->input('DisabilityID');
        // $details->PartFullTimeType          = $request->input('PartFullTimeType');
        // $details->FunctionalAreaID          = $request->input('FunctionalAreaID');
        // $details->FunctionalRoleID          = $request->input('FunctionalRoleID');


        $result=$details->save();
        return $result;
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
