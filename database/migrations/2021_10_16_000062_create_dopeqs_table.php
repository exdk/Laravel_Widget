<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDopeqsTable extends Migration
{
    public function up()
    {
        Schema::create('dopeqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('di')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
