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
            $table->string('hari_praktek', 100);
            $table->string('jam_buka', 5);
            $table->string('jam_tutup', 5);
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
