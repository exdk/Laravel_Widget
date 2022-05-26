<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMycompanTypeperevozPivotTable extends Migration
{
    public function up()
    {
        Schema::create('mycompan_typeperevoz', function (Blueprint $table) {
            $table->unsignedBigInteger('mycompan_id');
            $table->foreign('mycompan_id', 'mycompan_id_fk_4979628')->references('id')->on('mycompans')->onDelete('cascade');
            $table->unsignedBigInteger('typeperevoz_id');
            $table->foreign('typeperevoz_id', 'typeperevoz_id_fk_4979628')->references('id')->on('typeperevozs')->onDelete('cascade');
        });
    }
}
