
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Santri extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('santri', function (Blueprint $table) {
            $table->id('idsantri');
            $table->string('namasantri',50);
            $table->char('gender',1);
            $table->date('tanggallhr');
            $table->string('kotalhr',40);
            $table->string('namaortu',50);
            $table->string('alamatortu',100);
            $table->string('hp',15);
            $table->string('email',50)->unique();
            //$table->char('password',32);
            $table->char('password',100);
            $table->date('tanggalmasuk');
            $table->char('aktif',1)->default("0");
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
        Schema::dropIfExists('santri');
    }
}
