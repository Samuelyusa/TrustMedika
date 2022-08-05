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
        Schema::create('kliniks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_poli', 100);
            $table->string('alamat', 200);
            $table->string('jadwal')->nullable();
            $table->bigInteger('no_izin', 20)->nullable();
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
        // Schema::dropIfExists('kliniks');
    }
};
