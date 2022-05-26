<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAssignedDeliveresTable extends Migration
{
    public function up()
    {
        Schema::table('assigned_deliveres', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6121453')->references('id')->on('teams');
        });
    }
}
