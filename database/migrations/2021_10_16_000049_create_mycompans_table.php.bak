<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMycompansTable extends Migration
{
    public function up()
    {
        Schema::create('mycompans', function (Blueprint $table) {
            $table->bigIncrements('id', true);
            $table->string('hortname')->nullable();
            $table->string('longname')->nullable();
            $table->string('oporg')->nullable();
            $table->string('datet')->nullable();
            $table->string('typedejat')->nullable();
            $table->string('direktor')->nullable();
            $table->string('uradres')->nullable();
            $table->string('factadr')->nullable();
            $table->string('telefonorg')->nullable();
            $table->string('orgmobile')->nullable();
            $table->string('web')->nullable();
            $table->string('email')->nullable();
            $table->string('typenalog')->nullable();
            $table->string('innkpp')->nullable();
            $table->string('kpp')->nullable();
            $table->string('innogrn')->nullable();
            $table->string('bik')->nullable();
            $table->string('bank')->nullable();
            $table->string('rathet')->nullable();
            $table->string('korhet')->nullable();
            $table->string('reitopen')->nullable();
            $table->string('reiin')->nullable();
            $table->string('geogorod')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
