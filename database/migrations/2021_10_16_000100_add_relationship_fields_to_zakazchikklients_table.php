<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToZakazchikklientsTable extends Migration
{
    public function up()
    {
        Schema::table('zakazchikklients', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4979813')->references('id')->on('teams');
        });
    }
}
