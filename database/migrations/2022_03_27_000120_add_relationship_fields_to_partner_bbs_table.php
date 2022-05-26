<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPartnerBbsTable extends Migration
{
    public function up()
    {
        Schema::table('partner_bbs', function (Blueprint $table) {
            $table->unsignedBigInteger('partner_id')->nullable();
            $table->foreign('partner_id', 'partner_fk_6295945')->references('id')->on('mycompans');
            $table->unsignedBigInteger('valuta_id')->nullable();
            $table->foreign('valuta_id', 'valuta_fk_6295950')->references('id')->on('valuta');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_6295958')->references('id')->on('teams');
        });
    }
}
