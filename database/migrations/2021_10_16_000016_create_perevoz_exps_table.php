<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerevozExpsTable extends Migration
{
    public function up()
    {
        Schema::create('perevoz_exps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->string('inn')->nullable();
            $table->string('telefon')->nullable();
            $table->string('contactperson')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
