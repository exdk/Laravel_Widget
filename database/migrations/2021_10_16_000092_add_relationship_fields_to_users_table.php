<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('firma_id')->nullable();
            $table->foreign('firma_id', 'firma_fk_4979640')->references('id')->on('mycompans');
            $table->unsignedBigInteger('dolgno_id')->nullable();
            $table->foreign('dolgno_id', 'dolgno_fk_4979641')->references('id')->on('typedolgnostis');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_4979574')->references('id')->on('teams');
			$table->unsugnedBigInteger('pointload_id')->nullable();
        });
    }
}
