<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcsJobDispatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'JobReferenceID', 
        'JobTitle', 
        'JobDescription', 'SectorID', 'IndustryID',
        'MinExperienceYear', 'MaxExperienceYear', 'MinExpectedSalary', 'MaxExpectedSalary',
        'SalaryType', 'JobNatureCode', 'MinAge', 'MaxAge', 'GenderCode', 'NumberofOpenings',
        'MinQualificationID', 'ContactPersonName', 'ContactMobile', 'ContactEmail',
        'IsToDisplayContactInformation', 'IsToDisplayMobileOfEmployer', 'Keyskills',
        'JobPostExpiryDate', 'UGQualificationID', 'UGSpecializationID', 'UGYearFrom', 'UGYearTo',
        'PGQualificationID', 'PGSpecializationID', 'PGYearFrom', 'PGYearTo',
        'PHDQualificationID', 'PHDSpecializationID', 'PHDYearFrom', 'PHDYearTo',
        'PostedForEmployer', 'JobLocations', 'FunctionalAreaID', 'FunctionalRoleID',
        // Add other fields here
    ];
    public $timestamps = false;
    public $id = false;

    protected $casts = [
        'Keyskills' => 'array',
        'JobLocations'=> 'array'
        // other attributes...
    ];
}
