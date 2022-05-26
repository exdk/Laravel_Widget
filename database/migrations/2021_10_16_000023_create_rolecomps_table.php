<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolecompsTable extends Migration
{
    public function up()
    {
        Schema::create('rolecomps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titlerole')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
