<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoTypeloadPivotTable extends Migration
{
    public function up()
    {
        Schema::create('auto_typeload', function (Blueprint $table) {
            $table->unsignedBigInteger('auto_id');
            $table->foreign('auto_id', 'auto_id_fk_4979773')->references('id')->on('autos')->onDelete('cascade');
            $table->unsignedBigInteger('typeload_id');
            $table->foreign('typeload_id', 'typeload_id_fk_4979773')->references('id')->on('typeloads')->onDelete('cascade');
        });
    }
}
