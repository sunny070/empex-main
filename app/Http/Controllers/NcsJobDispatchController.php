<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use phpseclib3\Crypt\TripleDES;
use App\Models\NcsJobDispatch;

class NcsJobDispatchController extends Controller
{

    public function show()
    {
        // if (auth()->guard('admin')->user()->role_id != 1) {
        //     abort(401);
        //   }

        return view('admin.createJobPostNcs');
        // return view('admin.createJobPostNcs');
    }
    public function store(Request $request)
    {
        $details = new NcsJobDispatch;
        $details->JobReferenceID    = $request->input('JobReferenceID');
        $details->JobTitle =          $request->input('JobTitle');
        $details->JobDescription          = $request->input('JobDescription');
        $details->SectorID          = $request->input('SectorID');
        $details->IndustryID          = $request->input('IndustryID');
        $details->MinExperienceYear          = $request->input('MinExperienceYear');
        $details->MaxExperienceYear          = $request->input('MaxExperienceYear');
        $details->MinExpectedSalary          = $request->input('MinExpectedSalary');
        $details->MaxExpectedSalary          = $request->input('MaxExpectedSalary');
        $details->SalaryType          = $request->input('SalaryType');
        $details->JobNatureCode          = $request->input('JobNatureCode');
        $details->MinAge          = $request->input('MinAge');
        $details->MaxAge          = $request->input('MaxAge');
        $details->GenderCode          = $request->input('GenderCode');
        $details->NumberofOpenings          = $request->input('NumberofOpenings');
        $details->MinQualificationID          = $request->input('MinQualificationID');
        $details->ContactPersonName          = $request->input('ContactPersonName');
        $details->ContactMobile          = $request->input('ContactMobile');
        $details->ContactEmail          = $request->input('ContactEmail');
        $details->IsToDisplayContactInformation          = $request->input('IsToDisplayContactInformation');
        $details->IsToDisplayMobileOfEmployer          = $request->input('IsToDisplayMobileOfEmployer');
        
        $details->IsToDisplayMobileOfEmployer          = $request->input('IsToDisplayMobileOfEmployer');

        $details->Keyskills          =     $request->input('Keyskills');
        $details->JobPostExpiryDate          = $request->input('JobPostExpiryDate');
        $details->UGQualificationID          = $request->input('UGQualificationID');
        $details->UGSpecializationID          = $request->input('UGSpecializationID');
        $details->UGYearFrom          = $request->input('UGYearFrom');
        $details->UGYearTo          = $request->input('UGYearTo');
        $details->PGQualificationID          = $request->input('PGQualificationID');
        $details->PGSpecializationID          = $request->input('PGSpecializationID');
        $details->PGYearFrom          = $request->input('PGYearFrom');
        $details->PGYearTo          = $request->input('PGYearTo');
        $details->PHDQualificationID          = $request->input('PHDQualificationID');
        $details->PHDSpecializationID          = $request->input('PHDSpecializationID');
        $details->PHDYearFrom          = $request->input('PHDYearFrom');
        $details->PHDYearTo          = $request->input('PHDYearTo');
        $details->PostedForEmployer          = $request->input('PostedForEmployer');
        $details->JobLocations          = $request->input('JobLocations');
        // $details->ApplyJobUrl          = $request->input('ApplyJobUrl');
        $details->FunctionalAreaID          = $request->input('FunctionalAreaID');
        $details->FunctionalRoleID          = $request->input('FunctionalRoleID');
        $details->save();
        // dd($details);
        // return redirect()->route('jobsPostNcs')->with('success', 'Category Successfully created');

        // return $details;


        // if (env('APP_ENV') == 'local') {
        //     return;
        // }

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
                [
                    "JobReferenceID" => $details->JobReferenceID,
                    "JobTitle" => $details->JobTitle,
                    "JobDescription" => $details->JobDescription,
                    "SectorID" => $details->SectorID,
                    "IndustryID" => $details->IndustryID,
                    "MinExperienceYear" => $details->MinExperienceYear,
                    "MaxExperienceYear" => $details->MaxExperienceYear,
                    "MinExpectedSalary" => $details->MinExpectedSalary,
                    "MaxExpectedSalary" => $details->MaxExpectedSalary,
                    "SalaryType" => $details->SalaryType,
                    "JobNatureCode" => $details->JobNatureCode,
                    "MinAge" => $details->MinAge,
                    "MaxAge" => $details->MaxAge,
                    "GenderCode" => $details->GenderCode,
                    "NumberofOpenings" => $details->NumberofOpenings,
                    "MinQualificationID" => $details->MinQualificationID,
                    "ContactPersonName" => $details->ContactPersonName,
                    "ContactMobile" => $details->ContactMobile,
                    "ContactEmail" => $details->ContactEmail,
                    "IsToDisplayContactInformation" => $details->IsToDisplayContactInformation,
                    "IsToDisplayMobileOfEmployer" => $details->IsToDisplayMobileOfEmployer,
                    "IsToDisplayEmailIdOfEmployer" => $details->IsToDisplayMobileOfEmployer ,
                    // "Keyskills" => [["Skill" => "Sales"], ["Skill" => "Go to Market"]],
                    "JobPostExpiryDate" => $details->JobPostExpiryDate,
                    "UGQualificationID" => $details->UGQualificationID,
                    "UGSpecializationID" => $details->UGSpecializationID,
                    "UGYearFrom" => $details->UGYearFrom,
                    "UGYearTo" => $details->UGYearTo,
                    "PGQualificationID" => $details->PGQualificationID,
                    "PGSpecializationID" => $details->PGSpecializationID,
                    "PGYearFrom" => $details->PGYearFrom,
                    "PGYearTo" => $details->PGYearTo,
                    "PHDQualificationID" => $details->PHDQualificationID,
                    "PHDSpecializationID" => $details->PHDSpecializationID,
                    "PHDYearFrom" => $details->PHDYearFrom,
                    "PHDYearTo" => $details->PHDYearTo,
                    "PostedForEmployer" => $details->PostedForEmployer,
                    // "JobLocations" => [["CityID" => 66468], ["StateID" => 9]],
                    "ApplyJobUrl" => "https://dev.abc.co.in:8090/jobs/wiseyatra-rdight-holiday-technologies-pvt-ltd-content-writer-jobs-for-freshers-in-new-delhi-4958?from=ncs",
                    "FunctionalAreaID" => $details->FunctionalAreaID,
                    "FunctionalRoleID" => $details->FunctionalRoleID
                    //       
                ]
            );

            return $response->body();
        }
    }
}
