<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMycompanTypecompanyPivotTable extends Migration
{
    public function up()
    {
        Schema::create('mycompan_typecompany', function (Blueprint $table) {
            $table->unsignedBigInteger('mycompan_id');
            $table->foreign('mycompan_id', 'mycompan_id_fk_4979627')->references('id')->on('mycompans')->onDelete('cascade');
            $table->unsignedBigInteger('typecompany_id');
            $table->foreign('typecompany_id', 'typecompany_id_fk_4979627')->references('id')->on('typecompanies')->onDelete('cascade');
        });
    }
}
