<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPerevozExpsTable extends Migration
{
    public function up()
    {
        Schema::table('perevoz_exps', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4979950')->references('id')->on('teams');
        });
    }
}
