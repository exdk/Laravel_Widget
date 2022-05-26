<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakazchikklientsTable extends Migration
{
    public function up()
    {
        Schema::create('zakazchikklients', function (Blueprint $table) {
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
