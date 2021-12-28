<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengurus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengurus', function (Blueprint $table) {
            $table->id('idpengurus');
            $table->string('nama',50);
            $table->string('email',30)->unique();
            $table->string('hp',16);
            $table->char('gender',1);
            //$table->char('password',32);
            $table->char('password',100);
            $table->char('aktif',1);
            $table->string('profile_pic')->nullable();
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
        Schema::dropIfExists('pengurus');
    }
}
