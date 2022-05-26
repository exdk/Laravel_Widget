<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPerevozchikPerevozsTable extends Migration
{
    public function up()
    {
        Schema::table('perevozchik_perevozs', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4979957')->references('id')->on('teams');
        });
    }
}
