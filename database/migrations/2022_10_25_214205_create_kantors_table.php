<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKantorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kantors', function (Blueprint $table) {
            $table->increments('id_kantor');
            $table->string('kantor', 255);
            $table->string('lokasi', 500);
        });
        DB::statement('ALTER TABLE kantors MODIFY id_kantor INTEGER NOT NULL AUTO_INCREMENT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kantors');
    }
}
