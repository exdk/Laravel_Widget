<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToZakazhikPerevozsTable extends Migration
{
    public function up()
    {
        Schema::table('zakazhik_perevozs', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4979933')->references('id')->on('teams');
        });
    }
}
