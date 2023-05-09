<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAntreansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antreans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('nomor')->default(0);
            $table->integer('id_layanan');
            $table->integer('id_kantor');
            $table->date('tanggal');
            $table->string('nama_pelanggan', 255);
            $table->string('telepon', 14);
            $table->unsignedBigInteger('nomor_pelanggan')->nullable();
            $table->string('status')->default('tunggu');
            $table->integer('id_counter')->nullable();
            $table->foreign('id_layanan')->references('id_layanan')->on('layanans');
            $table->foreign('id_kantor')->references('id_kantor')->on('kantors');
            $table->foreign('nomor_pelanggan')->references('nomor_pelanggan')->on('pelanggans');
            $table->foreign('id_counter')->references('id_counter')->on('counters');
            // $table->timestamps();
        });
        DB::statement('ALTER TABLE antreans MODIFY id INTEGER NOT NULL AUTO_INCREMENT');

        DB::unprepared('
        CREATE TRIGGER NomorAntreanAutoIncrement BEFORE INSERT ON antreans
        FOR EACH ROW BEGIN
                SET NEW.nomor = (
                    SELECT IFNULL(MAX(nomor), 0) + 1
                    FROM antreans
                    WHERE (id_kantor = NEW.id_kantor and id_layanan = NEW.id_layanan and tanggal = NEW.tanggal)
                );
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antreans');
        DB::unprepared('DROP TRIGGER `NomorAntreanAutoIncrement`');
    }
}
