<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlavnaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glavna', function (Blueprint $table) {
            $table->id();
            $table->date('datum');
            $table->foreignId('objekat_id');
            $table->foreignId('radnja_id');
            $table->integer('kolicina'); 
            $table->foreign('objekat_id')
                  ->references('id')->on('objekat')
                  ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('radnja_id')
                  ->references('id')->on('radnja')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('glavna');
    }
}
