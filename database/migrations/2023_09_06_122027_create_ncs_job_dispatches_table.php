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
            $table->foreignId('SectorID')->constrained('sector_ncs');
            $table->foreignId('IndustryID')->constrained('industry_ncs');
            $table->string('JobDescription');
            $table->foreignId('JobNatureCode')->constrained('job_nature_code_ncs');
            $table->smallInteger('NumberofOpenings');
            $table->foreignId('MinQualificationID')->constrained('min_qualification_ncs');
            $table->string('ContactPersonName');
            $table->string('ContactMobile');
            $table->json('KeySkills');
            $table->dateTime('JobPostExpiryDate');
            $table->string('PostedForEmployer'); 
            // $table->foreignId('state_id')->nullable();
            // $table->foreignId('district_id');//added
            // $table->foreignId('StateID')->constrained('state_ncs')->nullable();
            // $table->foreignId('CityID')->constrained('city_ncs')->nullable();
            // $table->integer('MinExperienceYear')->nullable();
            // $table->integer('MaxExperienceYear')->nullable();
            // $table->integer('MinExpectedSalary')->nullable();
            // $table->integer('MaxExpectedSalary')->nullable();
            // $table->char('SalaryType', 1)->nullable();

            // $table->char('JobNatureCode');
            // $table->tinyInteger('MinAge')->nullable();
            // $table->tinyInteger('MaxAge')->nullable();
            // $table->char('GenderCode')->nullable();
            // $table->string('ContactEmail', 100)->nullable();
            // $table->boolean('IsToDisplayContactInformation')->nullable();
            // $table->boolean('IsToDisplayEmailIdOfEmployer')->nullable();
            // $table->boolean('IsToDisplayMobileOfEmployer')->nullable();
            // $table->foreignId('UGQualificationID')->constrained('educations')->nullable();
            // $table->foreignId('UGSpecializationID')->constrained('specializations')->nullable();
            // $table->smallInteger('UGYearFrom')->nullable();
            // $table->smallInteger('UGYearTo')->nullable();
            // $table->foreignId('PGQualificationID')->constrained('educations')->nullable();
            // $table->foreignId('PGSpecializationID')->constrained('specializations')->nullable();
            // $table->smallInteger('PGYearFrom')->nullable();
            // $table->smallInteger('PGYearTo')->nullable();
            // $table->foreignId('PHDQualificationID')->constrained('educations')->nullable();
            // $table->foreignId('PHDSpecializationID')->constrained('specializations')->nullable();
            // $table->smallInteger('PHDYearFrom')->nullable();
            // $table->smallInteger('PHDYearTo')->nullable();
            // $table->boolean('IsToDisplayEmployerName')->nullable();
            // $table->string('CasteCode', 35)->nullable();
            // $table->boolean('IsForExServicemen')->nullable();
            // $table->boolean('IsForDisabled')->nullable();
            // $table->foreignId('DisabilityID')->constrained('differently_abled_categories')->nullable();
            // $table->char('PartFullTimeType', 1)->nullable();
            // $table->foreignId('FunctionalAreaID')->constrained('educations')->nullable();
            // $table->foreignId('FunctionalRoleID')->constrained('educations')->nullable();
            $table->timestamps();
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
