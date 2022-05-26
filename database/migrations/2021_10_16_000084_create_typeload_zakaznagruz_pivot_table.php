<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeloadZakaznagruzPivotTable extends Migration
{
    public function up()
    {
        Schema::create('typeload_zakaznagruz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakaznagruz_id');
            $table->foreign('zakaznagruz_id', 'zakaznagruz_id_fk_4979997')->references('id')->on('zakaznagruzs')->onDelete('cascade');
            $table->unsignedBigInteger('typeload_id');
            $table->foreign('typeload_id', 'typeload_id_fk_4979997')->references('id')->on('typeloads')->onDelete('cascade');
        });
    }
}
