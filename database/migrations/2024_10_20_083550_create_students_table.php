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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->foreign('userID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('studentName');
            $table->string('parentName');
            $table->string('phoneNumber');
            $table->string('parentEmail');
            $table->string('address');
            $table->boolean('isPendaftaranChecked')->default(false);
            $table->boolean('isSelfActiveLearningChecked')->default(false);
            $table->boolean('isBiayaChecked')->default(false);
            $table->string('additionalQuestion')->nullable();
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
        Schema::dropIfExists('students');
    }
};
