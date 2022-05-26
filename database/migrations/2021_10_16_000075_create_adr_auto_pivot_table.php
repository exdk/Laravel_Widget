<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdrAutoPivotTable extends Migration
{
    public function up()
    {
        Schema::create('adr_auto', function (Blueprint $table) {
            $table->unsignedBigInteger('auto_id');
            $table->foreign('auto_id', 'auto_id_fk_4979771')->references('id')->on('autos')->onDelete('cascade');
            $table->unsignedBigInteger('adr_id');
            $table->foreign('adr_id', 'adr_id_fk_4979771')->references('id')->on('adrs')->onDelete('cascade');
        });
    }
}
