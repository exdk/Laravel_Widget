<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUncomfirmedsTable extends Migration
{
    public function up()
    {
        Schema::create('uncomfirmeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transpareon')->nullable();
            $table->string('kolonka')->nullable();
            $table->string('transportnoe_sredstvo_trebovanie')->nullable();
            $table->string('ves')->nullable();
            $table->string('obem')->nullable();
            $table->string('dlina')->nullable();
            $table->string('pozicii')->nullable();
            $table->string('strana_mesto_naznacheniya')->nullable();
            $table->string('vnutrenniy_kommentariy_k_perevozke')->nullable();
            $table->string('id_gryppi_perevozok')->nullable();
            $table->string('dopolnitelnie_nomera_gryzootpravitelya')->nullable();
            $table->string('dopolnitelniy_n_gryzootpravitelya_2')->nullable();
            $table->string('pochtoviy_indeks_mesto_naznacheniya')->nullable();
            $table->string('dopolnitelniy_n_gryzootpravitelya_3')->nullable();
            $table->string('kategorii')->nullable();
            $table->string('dispetcher_gryzootpravitelya')->nullable();
            $table->string('pochtoviy_indeks_start')->nullable();
            $table->string('region_start')->nullable();
            $table->string('strana_start')->nullable();
            $table->string('kommentariy_start')->nullable();
            $table->string('otdel_planirovaniya')->nullable();
            $table->string('period_zagryzki')->nullable();
            $table->string('period_razgryzki')->nullable();
            $table->string('start')->nullable();
            $table->string('mesto_naznacheniya')->nullable();
            $table->string('krainiy_srok')->nullable();
            $table->string('rassoyanie')->nullable();
            $table->string('sostoyanie_chteniya')->nullable();
            $table->string('sostoyanie_pechati')->nullable();
            $table->string('transporeonid')->nullable();
            $table->string('gryzootpravitel')->nullable();
            $table->string('postavki')->nullable();
            $table->string('data_pogryzki')->nullable();
            $table->string('data_razgryzki')->nullable();
            $table->string('poslednie_izmeneniya')->nullable();
            $table->string('opredelennie_mesta_zagryzki')->nullable();
            $table->string('nazvanie_kompanii_start')->nullable();
            $table->string('gorod_start')->nullable();
            $table->string('opredelennie_mesta_razgryzki')->nullable();
            $table->string('nazvanie_kompanii_mesto_naznacheniya')->nullable();
            $table->string('gorod_mesto_naznacheniya')->nullable();
            $table->string('spravochnaya_cena_perevozki')->nullable();
            $table->string('region_mesto_naznacheniya')->nullable();
            $table->string('kommentariy_mesto_naznacheniya')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
