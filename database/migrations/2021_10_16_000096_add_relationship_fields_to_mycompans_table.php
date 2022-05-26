<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMycompansTable extends Migration
{
    public function up()
    {
        Schema::table('mycompans', function (Blueprint $table) {
            $table->unsignedBigInteger('main_id')->nullable();
            $table->foreign('main_id', 'main_fk_5010987')->references('id')->on('mycompans');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4979626')->references('id')->on('teams');
        });
    }
}
