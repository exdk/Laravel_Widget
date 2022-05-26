<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfisTable extends Migration
{
    public function up()
    {
        Schema::create('rfis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->datetime('finish')->nullable();
            $table->longText('letter')->nullable();
            $table->string('limited')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
