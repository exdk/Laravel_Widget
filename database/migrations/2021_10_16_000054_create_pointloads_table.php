<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointloadsTable extends Migration
{
    public function up()
    {
        Schema::create('pointloads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sapid')->nullable();
            $table->string('title');
            $table->string('gorod')->nullable();
            $table->string('zip')->nullable();
            $table->string('region')->nullable();
            $table->string('ulitca')->nullable();
            $table->string('dom')->nullable();
            $table->string('komment')->nullable();
            $table->string('type')->nullable();
            $table->string('innfio')->nullable();
            $table->string('fioload')->nullable();
            $table->string('mobileload')->nullable();
            $table->string('pnot')->nullable();
            $table->string('pndo')->nullable();
            $table->string('pnbrot')->nullable();
            $table->string('pnbrdo')->nullable();
            $table->string('thot')->nullable();
            $table->string('thdo')->nullable();
            $table->string('thbrot')->nullable();
            $table->string('thbrdo')->nullable();
            $table->string('wedot')->nullable();
            $table->string('weddo')->nullable();
            $table->string('wedbrot')->nullable();
            $table->string('wedbrto')->nullable();
            $table->string('thuot')->nullable();
            $table->string('thudo')->nullable();
            $table->string('thubrot')->nullable();
            $table->string('thubrdo')->nullable();
            $table->string('friot')->nullable();
            $table->string('frido')->nullable();
            $table->string('fribrot')->nullable();
            $table->string('fribrdo')->nullable();
            $table->string('satot')->nullable();
            $table->string('satdo')->nullable();
            $table->string('satbrot')->nullable();
            $table->string('satbrdo')->nullable();
            $table->string('sunot')->nullable();
            $table->string('sundo')->nullable();
            $table->string('sunbrot')->nullable();
            $table->string('sunbrdo')->nullable();
            $table->boolean('holiday')->default(0)->nullable();
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
