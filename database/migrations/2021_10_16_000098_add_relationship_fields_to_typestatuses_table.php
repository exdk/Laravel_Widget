<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTypestatusesTable extends Migration
{
    public function up()
    {
        Schema::table('typestatuses', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4980276')->references('id')->on('teams');
        });
    }
}
