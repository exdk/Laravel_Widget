<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSourcegoodsTable extends Migration
{
    public function up()
    {
        Schema::create('sourcegoods', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('de')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
