<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilialmainsTable extends Migration
{
    public function up()
    {
        Schema::create('filialmains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('inn')->nullable();
            $table->string('title')->nullable();
            $table->string('main')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
