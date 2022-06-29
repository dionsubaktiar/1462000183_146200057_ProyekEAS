<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->string('bulan');
            $table->integer('jumlah_masuk');
            $table->integer('terjual');
            $table->integer('hp_model_id')->unassigned();
            $table->integer('merk_model_id')->unassigned();
            $table->integer('pegawai_model_id')->unassigned();
            $table->timestamps();
        });
        Schema::table('laporan',function($table){
            $table->foreign('hp_model_id')->references('id')->on('hp')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pegawai_model_id')->references('id')->on('pegawai')
            ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('merk_model_id')->references('id')->on('merk')
            ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan');
    }
};
