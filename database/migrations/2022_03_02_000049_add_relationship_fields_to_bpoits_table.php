<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToBpoitsTable extends Migration
{
    public function up()
    {
        Schema::table('bpoits', function (Blueprint $table) {
        	if(!Schema::hasColumn('bpoits', 'country_id')){
            	$table->unsignedBigInteger('country_id')->nullable();
            	$table->foreign('country_id', 'country_fk_5879319')->references('id')->on('countries');
        	}

        	if(!Schema::hasColumn('bpoits', 'team_id')){
	            $table->unsignedBigInteger('team_id')->nullable();
	            $table->foreign('team_id', 'team_fk_5880857')->references('id')->on('teams');
        	}
        });
    }
}
