<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use PHPUnit\Framework\Constraint\Constraint;

class Bab extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
     
    public function up()
    {
        Schema::create('bab', function (Blueprint $table) {
            $table->id('idbab');

            //format membuat foreign key (fk)
            $table->foreignId('idbuku')->constrained('buku', 'idbuku');

            $table->string('bab',50);
            $table->string('judul',100);
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
        Schema::dropIfExists('bab');
    }
}
