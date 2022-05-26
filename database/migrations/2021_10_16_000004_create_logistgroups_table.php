<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogistgroupsTable extends Migration
{
    public function up()
    {
        Schema::create('logistgroups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();
            $table->string('de')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
