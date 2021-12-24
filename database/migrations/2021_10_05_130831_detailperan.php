<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detailperan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('detailperan', function (Blueprint $table) {
            $table->id('iddetailperan');

            // //format membuat foreign key (fk)
            $table->foreignId('idperan')->constrained('peran', 'idperan')->onDelete('cascade');
            $table->foreignId('idpengurus')->constrained('pengurus', 'idpengurus');

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
        Schema::dropIfExists('detailperan');
    }
}
