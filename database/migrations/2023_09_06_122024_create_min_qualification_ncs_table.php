<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinQualificationNcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('min_qualification_ncs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('EducationGroup');
            $table->string('EducationLevel');
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
        Schema::dropIfExists('min_qualification_ncs');
    }
}
