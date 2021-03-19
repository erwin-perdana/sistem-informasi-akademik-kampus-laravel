<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_krs');
            $table->integer('id_mahasiswa');
            $table->integer('id_schedule');
            $table->integer('id_ta');
            $table->integer('p1')->nullable()->default(0);
            $table->integer('p2')->nullable()->default(0);
            $table->integer('p3')->nullable()->default(0);
            $table->integer('p4')->nullable()->default(0);
            $table->integer('p5')->nullable()->default(0);
            $table->integer('p6')->nullable()->default(0);
            $table->integer('p7')->nullable()->default(0);
            $table->integer('p8')->nullable()->default(0);
            $table->integer('p9')->nullable()->default(0);
            $table->integer('p10')->nullable()->default(0);
            $table->integer('p11')->nullable()->default(0);
            $table->integer('p12')->nullable()->default(0);
            $table->integer('p13')->nullable()->default(0);
            $table->integer('p14')->nullable()->default(0);
            $table->integer('p15')->nullable()->default(0);
            $table->integer('p16')->nullable()->default(0);
            $table->integer('p17')->nullable()->default(0);
            $table->integer('p18')->nullable()->default(0);
            
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
        Schema::dropIfExists('absens');
    }
}
