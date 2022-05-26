<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnitmasTable extends Migration
{
    public function up()
    {
        Schema::create('unitmas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titleru')->nullable();
            $table->string('rubol')->nullable();
            $table->string('megd')->nullable();
            $table->string('megd_bol')->nullable();
            $table->string('di')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
