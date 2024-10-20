<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('scheduleName');
            $table->dateTime('scheduleDeadline');
            $table->string('scheduleType');
            $table->string('scheduleSubmissionName')->nullable();
            $table->string('zoomLink')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
