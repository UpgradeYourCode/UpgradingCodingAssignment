<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamapaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('namapakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('deskripsi');
            $table->float('harga');
            $table->float('modal');
            $table->float('untung');
            $table->string('status');
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
        Schema::dropIfExists('namapakets');
    }
}
