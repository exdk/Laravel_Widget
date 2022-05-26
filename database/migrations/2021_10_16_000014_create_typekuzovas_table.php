<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypekuzovasTable extends Migration
{
    public function up()
    {
        Schema::create('typekuzovas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('typekuzova')->nullable();
            $table->string('korot')->nullable();
            $table->string('world')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
