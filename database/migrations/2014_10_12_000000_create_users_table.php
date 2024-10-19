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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('studentName');
            $table->string('parentName');
            $table->string('email')->unique();
            $table->string('phoneNumber');
            $table->string('password');
            $table->string('address');
            $table->boolean('isPendaftaranChecked')->default(false);
            $table->boolean('isSelfActiveLearningChecked')->default(false);
            $table->boolean('isBiayaChecked')->default(false);
            $table->string('additionalQuestion')->nullable();
            $table->boolean('isAdmin');
            $table->string('status');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
