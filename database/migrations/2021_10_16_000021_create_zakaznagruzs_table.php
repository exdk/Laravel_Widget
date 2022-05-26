<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZakaznagruzsTable extends Migration
{
    public function up()
    {
        Schema::create('zakaznagruzs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('bookmark')->default(0)->nullable();
            $table->string('draft')->nullable();
            $table->string('sapid')->nullable();
            $table->integer('tonnag')->nullable();
            $table->float('kubatura', 2, 1)->nullable();
            $table->string('qpack')->nullable();
            $table->string('lendth')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('diameter')->nullable();
            $table->boolean('krugorei')->default(0)->nullable();
            $table->date('dateload')->nullable();
            $table->string('timeloada')->nullable();
            $table->string('timeloadado')->nullable();
            $table->boolean('a_24')->default(0)->nullable();
            $table->string('dopinfoload')->nullable();
            $table->date('cdate')->nullable();
            $table->string('ctime')->nullable();
            $table->string('ctimedo')->nullable();
            $table->boolean('с_24')->default(0)->nullable();
            $table->string('cdopinfo')->nullable();
            $table->string('qauto')->nullable();
            $table->string('qbelt')->nullable();
            $table->string('tempot')->nullable();
            $table->string('tempdo')->nullable();
            $table->string('typeoplata')->nullable();
            $table->string('uoviaoplati')->nullable();
            $table->string('typetorgov')->nullable();
            $table->string('tekprice')->nullable();
            $table->decimal('tart_tena', 15, 2)->nullable();
            $table->string('valuta')->nullable();
            $table->string('bankday')->nullable();
            $table->string('tart_nd')->nullable();
            $table->string('bank_daynd')->nullable();
            $table->string('nal')->nullable();
            $table->string('naldn')->nullable();
            $table->boolean('nalcard')->default(0)->nullable();
            $table->integer('hagponig')->nullable();
            $table->string('max')->nullable();
            $table->string('dopinfoplata')->nullable();
            $table->string('kontaktprim')->nullable();
            $table->string('ktomoget')->nullable();
            $table->string('nahalo')->nullable();
            $table->date('nahalodate')->nullable();
            $table->string('nahalotime')->nullable();
            $table->string('finita')->nullable();
            $table->date('finitadate')->nullable();
            $table->string('finitatime')->nullable();
            $table->string('hour')->nullable();
            $table->string('min')->nullable();
            $table->string('idcomp')->nullable();
            $table->string('iduser')->nullable();
            $table->string('perez')->nullable();
            $table->string('look')->nullable();
            $table->string('kolo')->nullable();
            $table->string('dop_1_t')->nullable();
            $table->string('dop_1_adr')->nullable();
            $table->string('dop_1_tot')->nullable();
            $table->string('dop_2_t')->nullable();
            $table->string('dop_2_adr')->nullable();
            $table->string('dop_2_tot')->nullable();
            $table->string('dop_3_t')->nullable();
            $table->string('dop_3_adr')->nullable();
            $table->string('dop_3_tot')->nullable();
            $table->string('dop_4_t')->nullable();
            $table->string('dop_4_adr')->nullable();
            $table->string('dop_4_tot')->nullable();
            $table->string('dop_5_t')->nullable();
            $table->string('dop_5_adr')->nullable();
            $table->string('dop_5_tot')->nullable();
            $table->string('di')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
