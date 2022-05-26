<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonitorngsTable extends Migration
{
    public function up()
    {
        Schema::create('monitorngs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lang')->nullable();
            $table->string('lat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
