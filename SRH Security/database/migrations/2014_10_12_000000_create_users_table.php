<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('userType'); // 1 for admin,
            $table->rememberToken();
            $table->timestamps();
        });


        DB::table('users')->insert(
            array(
                array(

                    'username' => 'admin',
                    'email' => 'admin@test.com',
                    'password' => '$2y$10$46Y2SPvnA.GIejLuevj5Q.x/oHV8.nAcv/pMNC6wWZ3Cjjq3iw9A2',
                    'userType' => '1',
                    'created_at' => '2020-01-01 00:00:00',
                    'updated_at' => '2020-01-01 00:00:00'
                )

            )

        );


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
}
