<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('student_id')->unique();
            $table->text('name')->nullable();
            $table->text('roomno')->nullable();
            $table->text('bedno')->nullable();
            $table->text('department')->nullable();
            $table->text('ses')->nullable();
            $table->text('yearSem')->nullable();
            $table->text('fname')->nullable();
            $table->text('mname')->nullable();
            $table->text('cnumber')->nullable();
            $table->string('email')->nullable();
            $table->string('guarcontact')->nullable();
            $table->text('blood_group')->nullable();
            $table->text('address')->nullable();
            $table->string('bcode')->unique();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('profile_models');
    }
}
