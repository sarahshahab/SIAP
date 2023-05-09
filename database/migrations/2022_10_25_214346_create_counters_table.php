<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counters', function (Blueprint $table) {
            $table->increments('id_counter');
            $table->integer('id_layanan');
            $table->integer('id_kantor');
            $table->date('tanggal')->nullable();
            $table->integer('nomor_counter');
            $table->string('id', 255)->unique();
            $table->integer('operator', 255)->nullable();
            $table->foreign('id_layanan')->references('id_layanan')->on('layanans');
            $table->foreign('id_kantor')->references('id_kantor')->on('kantors');
            $table->foreign('operator')->references('id')->on('users');
        });
        DB::statement('ALTER TABLE counters MODIFY id_counter INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('counters');
    }
}
