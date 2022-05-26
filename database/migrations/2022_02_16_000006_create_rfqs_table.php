<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRfqsTable extends Migration
{
    public function up()
    {
        Schema::create('rfqs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->string('title')->nullable();
            $table->datetime('finish')->nullable();
            $table->string('type')->nullable();
            $table->string('limited')->nullable();
            $table->date('datestartdogovor')->nullable();
            $table->date('dateenddogovor')->nullable();
            $table->longText('desc')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
