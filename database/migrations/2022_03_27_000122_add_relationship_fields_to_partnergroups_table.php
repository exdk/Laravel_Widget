<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPartnergroupsTable extends Migration
{
    public function up()
    {
        Schema::table('partnergroups', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6296005')->references('id')->on('teams');
        });
    }
}
