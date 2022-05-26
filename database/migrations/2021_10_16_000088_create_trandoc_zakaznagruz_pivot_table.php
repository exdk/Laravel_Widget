<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrandocZakaznagruzPivotTable extends Migration
{
    public function up()
    {
        Schema::create('trandoc_zakaznagruz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakaznagruz_id');
            $table->foreign('zakaznagruz_id', 'zakaznagruz_id_fk_4980005')->references('id')->on('zakaznagruzs')->onDelete('cascade');
            $table->unsignedBigInteger('trandoc_id');
            $table->foreign('trandoc_id', 'trandoc_id_fk_4980005')->references('id')->on('trandocs')->onDelete('cascade');
        });
    }
}
