<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutobirgaTypeloadPivotTable extends Migration
{
    public function up()
    {
        Schema::create('autobirga_typeload', function (Blueprint $table) {
            $table->unsignedBigInteger('autobirga_id');
            $table->foreign('autobirga_id', 'autobirga_id_fk_4980194')->references('id')->on('autobirgas')->onDelete('cascade');
            $table->unsignedBigInteger('typeload_id');
            $table->foreign('typeload_id', 'typeload_id_fk_4980194')->references('id')->on('typeloads')->onDelete('cascade');
        });
    }
}
