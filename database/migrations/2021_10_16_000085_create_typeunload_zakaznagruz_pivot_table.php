<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeunloadZakaznagruzPivotTable extends Migration
{
    public function up()
    {
        Schema::create('typeunload_zakaznagruz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakaznagruz_id');
            $table->foreign('zakaznagruz_id', 'zakaznagruz_id_fk_4980002')->references('id')->on('zakaznagruzs')->onDelete('cascade');
            $table->unsignedBigInteger('typeunload_id');
            $table->foreign('typeunload_id', 'typeunload_id_fk_4980002')->references('id')->on('typeunloads')->onDelete('cascade');
        });
    }
}
