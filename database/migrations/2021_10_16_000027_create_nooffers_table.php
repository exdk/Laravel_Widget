<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNooffersTable extends Migration
{
    public function up()
    {
        Schema::create('nooffers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('datefpogr')->nullable();
            $table->string('dateunload')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
