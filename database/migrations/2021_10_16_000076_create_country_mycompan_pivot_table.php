<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryMycompanPivotTable extends Migration
{
    public function up()
    {
        Schema::create('country_mycompan', function (Blueprint $table) {
            $table->unsignedBigInteger('mycompan_id');
            $table->foreign('mycompan_id', 'mycompan_id_fk_4979629')->references('id')->on('mycompans')->onDelete('cascade');
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id', 'country_id_fk_4979629')->references('id')->on('countries')->onDelete('cascade');
        });
    }
}
