<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTypedolgnostiPivotTable extends Migration
{
    public function up()
    {
        Schema::create('role_typedolgnosti', function (Blueprint $table) {
            $table->unsignedBigInteger('typedolgnosti_id');
            $table->foreign('typedolgnosti_id', 'typedolgnosti_id_fk_4979634')->references('id')->on('typedolgnostis')->onDelete('cascade');
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id', 'role_id_fk_4979634')->references('id')->on('roles')->onDelete('cascade');
        });
    }
}
