<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdrAutobirgaPivotTable extends Migration
{
    public function up()
    {
        Schema::create('adr_autobirga', function (Blueprint $table) {
            $table->unsignedBigInteger('autobirga_id');
            $table->foreign('autobirga_id', 'autobirga_id_fk_4980195')->references('id')->on('autobirgas')->onDelete('cascade');
            $table->unsignedBigInteger('adr_id');
            $table->foreign('adr_id', 'adr_id_fk_4980195')->references('id')->on('adrs')->onDelete('cascade');
        });
    }
}
