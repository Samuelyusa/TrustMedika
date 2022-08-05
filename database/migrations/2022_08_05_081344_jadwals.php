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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klinik_id')->constrained('klinik')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pegawai_id')->constrained('pegawai')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('senin', 13)->nullable();
            $table->string('selasa', 13)->nullable();
            $table->string('rabu', 13)->nullable();
            $table->string('kamis', 13)->nullable();
            $table->string('jumat', 13)->nullable();
            $table->string('sabtu', 13)->nullable();
            $table->string('minggu', 13)->nullable();
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
        //
    }
};
