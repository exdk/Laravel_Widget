<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondpaysTable extends Migration
{
    public function up()
    {
        Schema::create('condpays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('di')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
