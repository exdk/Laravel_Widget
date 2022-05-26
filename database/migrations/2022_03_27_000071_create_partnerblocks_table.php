<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerblocksTable extends Migration
{
    public function up()
    {
        Schema::create('partnerblocks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('contactperson')->nullable();
            $table->string('telefon')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
