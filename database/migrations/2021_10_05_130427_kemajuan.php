<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Kemajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('kemajuan', function (Blueprint $table) {
            $table->id('idkemajuan');

            //format membuat foreign key (fk)
            $table->foreignId('idsantri')->constrained('santri', 'idsantri');
            $table->foreignId('idpengurus')->constrained('pengurus', 'idpengurus');

            $table->timestamp('tanggal');
            $table->char('status',1);

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
        Schema::dropIfExists('kemajuan');
    }
     
}
