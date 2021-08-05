<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('specialityId');
            $table->foreign('specialityId')->references('id')->on('specialities');
            $table->unsignedBigInteger('countryId');
            $table->foreign('countryId')->references('id')->on('countries');
            $table->unsignedBigInteger('cityId');
            $table->foreign('cityId')->references('id')->on('cities');
            
            $table->string('first_name_ar')->nullable();
            $table->string('last_name_ar')->nullable();
            $table->string('first_name_en')->nullable();
            $table->string('last_name_en')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            
            $table->string('specialityDesc_ar')->nullable();
            $table->string('specialityDesc_en')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();

            $table->string('mobile')->nullable();
            $table->string('address_ar')->nullable();
            $table->string('address_en')->nullable();
            $table->string('location')->nullable();
            $table->string('experience')->nullable();
            $table->string('gender')->nullable();
            $table->text('photo')->nullable();   

            $table->text('university_degree')->nullable();// الشهادة الجامعية
            $table->text('practice_certificate')->nullable();//شهادة ممارسة المهنه
            $table->text('other_qualification')->nullable(); // 
            $table->string('rate')->nullable();
            $table->integer('status')->default(1);

            $table->string('membershipNo')->nullable();
            $table->string('authority_ar')->nullable();
            $table->string('authority_en')->nullable();
            $table->string('degree_ar')->nullable();
            $table->string('degree_en')->nullable();
            $table->string('yearOfRegistration')->nullable();
            $table->string('bankNumber')->nullable();


            $table->text('token')->nullable();
            $table->text('device_token')->nullable();


            
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
        Schema::dropIfExists('doctors');
    }
}
