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
        Schema::create('hp', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->integer('jumlah');
            $table->string('nama_hp');
            $table->timestamps();
        });
        Schema::table('hp', function ($table) {


            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hp');
    }
};
