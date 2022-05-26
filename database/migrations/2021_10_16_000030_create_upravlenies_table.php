<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUpravleniesTable extends Migration
{
    public function up()
    {
        Schema::create('upravlenies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('datestart')->nullable();
            $table->date('date_fin')->nullable();
            $table->time('timetart')->nullable();
            $table->time('time_fin')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
