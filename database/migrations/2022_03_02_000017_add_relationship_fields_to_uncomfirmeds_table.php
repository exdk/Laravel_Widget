<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUncomfirmedsTable extends Migration
{
    public function up()
    {
        Schema::table('uncomfirmeds', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6113740')->references('id')->on('teams');
        });
    }
}
