<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateValutaTable extends Migration
{
    public function up()
    {
        Schema::create('valuta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code')->nullable();
            $table->string('code_2')->nullable();
            $table->string('title')->nullable();
            $table->string('unicode')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
