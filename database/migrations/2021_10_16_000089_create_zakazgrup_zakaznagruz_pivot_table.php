<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakazgrupZakaznagruzPivotTable extends Migration
{
    public function up()
    {
        Schema::create('zakazgrup_zakaznagruz', function (Blueprint $table) {
            $table->unsignedBigInteger('zakaznagruz_id');
            $table->foreign('zakaznagruz_id', 'zakaznagruz_id_fk_4980015')->references('id')->on('zakaznagruzs')->onDelete('cascade');
            $table->unsignedBigInteger('zakazgrup_id');
            $table->foreign('zakazgrup_id', 'zakazgrup_id_fk_4980015')->references('id')->on('zakazgrups')->onDelete('cascade');
        });
    }
}
