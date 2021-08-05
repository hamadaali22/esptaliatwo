<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorId');
            $table->foreign('doctorId')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('patientId');
            $table->foreign('patientId')->references('id')->on('patients')->onDelete('cascade');
            $table->date('date')->nullable();
            $table->string('time')->nullable();

            $table->string('permanent_type')->nullable();
            $table->string('status')->default(1);
            $table->integer('payment_status')->nullable();
            $table->integer('amount')->nullable();
            $table->string('type')->nullable();
            $table->integer('expire')->nullable();
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
        Schema::dropIfExists('appointments');
    }
}
