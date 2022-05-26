<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLasteventsTable extends Migration
{
    public function up()
    {
        Schema::create('lastevents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('di')->nullable();
            $table->string('user')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
