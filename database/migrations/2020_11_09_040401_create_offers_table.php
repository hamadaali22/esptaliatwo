<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            
            $table->string('offer_name_ar')->nullable();
            $table->string('offer_name_en')->nullable();
            $table->string('description_ar')->nullable();
            $table->string('description_en')->nullable();

            $table->integer('old_price')->nullable();
            $table->integer('new_price')->nullable();
            $table->string('percent')->nullable();  //  التخفيض كام ف المائة
            $table->text('image')->nullable();
            $table->text('type')->nullable();

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
        Schema::dropIfExists('offers');
    }
}
