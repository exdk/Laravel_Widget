<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypekuzovaZakaznagruzPivotTable extends Migration
{
    public function up()
    {
        Schema::create('typekuzova_zakaznagruz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakaznagruz_id');
            $table->foreign('zakaznagruz_id', 'zakaznagruz_id_fk_4980001')->references('id')->on('zakaznagruzs')->onDelete('cascade');
            $table->unsignedBigInteger('typekuzova_id');
            $table->foreign('typekuzova_id', 'typekuzova_id_fk_4980001')->references('id')->on('typekuzovas')->onDelete('cascade');
        });
    }
}
