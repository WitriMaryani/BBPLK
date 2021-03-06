<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbMProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_m_programs', function (Blueprint $table) {
            $table->increments('id');
             $table->string('kd_program')->unique();
            $table->string('kd_kejuruan');
            $table->foreign('kd_kejuruan')->references('kd_kejuruan')
                  ->on('tb_m_kejuruans')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('kd_sub_kejuruan');
            $table->foreign('kd_sub_kejuruan')->references('kd_sub_kejuruan')
                  ->on('tb_m_sub_kejuruans')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
            $table->string('nama_program');
            $table->integer('jumlah_paket');
            $table->integer('lama_pelatihan');
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
        Schema::dropIfExists('tb_m_programs');
    }
}
