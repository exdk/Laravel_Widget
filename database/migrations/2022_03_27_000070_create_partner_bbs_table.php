<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartnerBbsTable extends Migration
{
    public function up()
    {
        Schema::create('partner_bbs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status')->nullable();
            $table->string('typedogovor');
            $table->string('dogovor_number')->nullable();
            $table->date('dogovor_start');
            $table->date('dogovor_end');
            $table->string('description')->nullable();
            $table->string('contactperson')->nullable();
            $table->string('telefon')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
