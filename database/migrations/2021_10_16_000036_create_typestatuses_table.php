<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypestatusesTable extends Migration
{
    public function up()
    {
        Schema::create('typestatuses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('kor')->nullable();
            $table->string('di')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
