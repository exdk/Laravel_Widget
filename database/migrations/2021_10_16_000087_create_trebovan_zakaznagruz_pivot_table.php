<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrebovanZakaznagruzPivotTable extends Migration
{
    public function up()
    {
        Schema::create('trebovan_zakaznagruz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakaznagruz_id');
            $table->foreign('zakaznagruz_id', 'zakaznagruz_id_fk_4980004')->references('id')->on('zakaznagruzs')->onDelete('cascade');
            $table->unsignedBigInteger('trebovan_id');
            $table->foreign('trebovan_id', 'trebovan_id_fk_4980004')->references('id')->on('trebovans')->onDelete('cascade');
        });
    }
}
