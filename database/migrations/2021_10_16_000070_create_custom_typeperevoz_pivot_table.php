<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomTypeperevozPivotTable extends Migration
{
    public function up()
    {
        Schema::create('custom_typeperevoz', function (Blueprint $table) {
            $table->unsignedBigInteger('custom_id');
            $table->foreign('custom_id', 'custom_id_fk_4980200')->references('id')->on('customs')->onDelete('cascade');
            $table->unsignedBigInteger('typeperevoz_id');
            $table->foreign('typeperevoz_id', 'typeperevoz_id_fk_4980200')->references('id')->on('typeperevozs')->onDelete('cascade');
        });
    }
}
