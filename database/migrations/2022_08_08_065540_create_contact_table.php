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
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_siswa')->unsigned();
            $table->foreign('siswa_id')->references('id')->on('siswa')
                ->onDelete('cascode')
                ->onUpdate('cascode');
            $table->BigInteger('jenis_contact_id')->unsigned();
            $table->foreign('jenis_contact_id')->references('id')->on('jenis_contact')
                ->onDelete('cascode')
                ->onUpdate('cascode');
            $table->char('deskripsi');
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
        Schema::dropIfExists('contact');
    }
};
