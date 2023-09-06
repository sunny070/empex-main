<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NcsJobDispatch extends Model
{
    use HasFactory;
    protected $table = 'ncs_job_dispatches';

    protected $fillable = [
        'JobReferenceID',
        'JobTitle',
        'SectorID',
        'IndustryID',
        'JobDescription',
        'MinExperienceYear',
        'MaxExperienceYear',
        'MinExpectedSalary',
        'MaxExpectedSalary',
        'JobNatureCode',
        'NumberofOpenings',
        'MinQualificationID',
        'ContactPersonName',
        'ContactMobile',
        'KeySkills',
    ];

    public function sector()
    {
        return $this->belongsTo(SectorNcs::class, 'SectorID');
    }

    public function industry()
    {
        return $this->belongsTo(IndustryNcs::class, 'IndustryID');
    }

    public function jobNature()
    {
        return $this->belongsTo(JobNatureCodeNcs::class, 'JobNatureCode');
    }

    public function minQualification()
    {
        return $this->belongsTo(MinQualificationNcs::class, 'MinQualificationID');
    }
}
