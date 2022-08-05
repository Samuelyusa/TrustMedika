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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kliniks_id')->constrained('klinik')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->string('name', 100);
            $table->string('gender', 1);
            $table->string('nip', 12)->nullable();
            $table->string('jabatan', 100);
            $table->string('status', 100);
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
        // Schema::dropIfExists('pegawais');
    }
};
