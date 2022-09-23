<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailAlternatifsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_alternatif')->unsigned();
            $table->foreign('id_alternatif')->references('id')->on('alternatifs');
            // $table->bigInteger('id_kriteria')->unsigned();
            // $table->foreign('id_kriteria')->references('id')->on('criterias');
            $table->bigInteger('id_sub')->unsigned();
            $table->foreign('id_sub')->references('id')->on('sub_criterias');
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
        Schema::dropIfExists('detail_alternatifs');
    }
}
