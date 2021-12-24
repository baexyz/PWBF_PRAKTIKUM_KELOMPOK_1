<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Detailkemajuan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
    {
        Schema::create('detailkemajuan', function (Blueprint $table) {
            $table->id('iddetailkemajuan');

            //format membuat foreign key (fk)
            $table->foreignId('idkemajuan')->constrained('kemajuan', 'idkemajuan')->onDelete('cascade');
            $table->foreignId('idbab')->nullable()->constrained('bab', 'idbab')->onDelete('cascade');

            $table->longText('keterangan');

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
        Schema::dropIfExists('detailkemajuan');
    }
}
