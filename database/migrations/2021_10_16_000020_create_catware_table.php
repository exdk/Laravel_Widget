<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatwareTable extends Migration
{
    public function up()
    {
        Schema::create('catware', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category')->nullable();
            $table->string('dep')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
