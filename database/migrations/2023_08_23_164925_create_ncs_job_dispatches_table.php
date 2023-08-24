<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNcsJobDispatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ncs_job_dispatches', function (Blueprint $table) {
            $table->id();
            $table->string('JobReferenceID');
        $table->string('JobTitle');
        $table->text('JobDescription');
        $table->unsignedBigInteger('SectorID');
        $table->unsignedBigInteger('IndustryID');
        $table->unsignedInteger('MinExperienceYear');
        $table->unsignedInteger('MaxExperienceYear');
        $table->unsignedInteger('MinExpectedSalary');
        $table->unsignedInteger('MaxExpectedSalary');
        $table->char('SalaryType', 1);
        $table->char('JobNatureCode', 1);
        $table->unsignedInteger('MinAge');
        $table->unsignedInteger('MaxAge');
        $table->char('GenderCode', 1);
        $table->unsignedInteger('NumberofOpenings');
        $table->unsignedBigInteger('MinQualificationID');
        $table->string('ContactPersonName');
        $table->unsignedBigInteger('ContactMobile');
        $table->string('ContactEmail');
        $table->boolean('IsToDisplayContactInformation')->default(1);
        $table->boolean('IsToDisplayMobileOfEmployer')->default(1);
        $table->boolean('IsToDisplayEmailIdOfEmployer')->default(1);

        $table->json('Keyskills');
        $table->date('JobPostExpiryDate');
        $table->unsignedBigInteger('UGQualificationID');
        $table->unsignedBigInteger('UGSpecializationID');
        $table->year('UGYearFrom');
        $table->year('UGYearTo');
        $table->unsignedBigInteger('PGQualificationID');
        $table->unsignedBigInteger('PGSpecializationID');
        $table->year('PGYearFrom');
        $table->year('PGYearTo');
        $table->unsignedBigInteger('PHDQualificationID');
        $table->unsignedBigInteger('PHDSpecializationID');
        $table->year('PHDYearFrom');
        $table->year('PHDYearTo');
        $table->string('PostedForEmployer');
        $table->json('JobLocations');
        $table->string('ApplyJobUrl');
        $table->unsignedBigInteger('FunctionalAreaID');
        $table->unsignedBigInteger('FunctionalRoleID');
        // $table->timestamps();
            // ... continue defining other columns
            
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ncs_job_dispatches');
    }
}
