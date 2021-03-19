<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->integer('id_krs');
            $table->integer('id_mahasiswa');
            $table->integer('id_schedule');
            $table->integer('id_ta');
            $table->integer('nilai_absen')->nullable()->default(0);
            $table->integer('nilai_tugas')->nullable()->default(0);
            $table->integer('nilai_uts')->nullable()->default(0);
            $table->integer('nilai_uas')->nullable()->default(0);
            $table->integer('nilai_akhir')->nullable()->default(0);
            $table->string('nilai_huruf')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('nilais');
    }
}
