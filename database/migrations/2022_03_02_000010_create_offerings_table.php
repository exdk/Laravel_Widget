<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferingsTable extends Migration
{
    public function up()
    {
        Schema::create('offerings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date_first_load')->nullable();
            $table->string('transporeonid')->nullable();
            $table->string('neobhodimie_perevozki')->nullable();
            $table->string('procent_kvoti_vipolneno')->nullable();
            $table->string('poslednie_izmeneniya')->nullable();
            $table->string('opredelennie_mesta_zagryzki')->nullable();
            $table->string('poctoviy_indeks_start')->nullable();
            $table->string('region_start')->nullable();
            $table->string('strana_start')->nullable();
            $table->string('kommentariy_start')->nullable();
            $table->string('opredelennie_mesta_razgryzki')->nullable();
            $table->string('poctoviy_indeks_mesto_naznaceniya')->nullable();
            $table->string('strana_mesto_naznaceniya')->nullable();
            $table->string('kommentariy_mesto_naznaceniya')->nullable();
            $table->string('predlozheniya')->nullable();
            $table->string('predlozhenie')->nullable();
            $table->string('tip_predlozheniya')->nullable();
            $table->date('deystvitelno_do')->nullable();
            $table->string('kommentarii_k_predlozheniyu')->nullable();
            $table->string('transportnoe_sredstvo_trebovanie')->nullable();
            $table->string('ves')->nullable();
            $table->string('obem')->nullable();
            $table->string('dlina')->nullable();
            $table->string('pozicii')->nullable();
            $table->string('vnutrenniy_kommentariy_k_perevozke')->nullable();
            $table->string('id_gryppi_perevozok')->nullable();
            $table->string('dopolnitelnie_nomera_gryzootpravitelya')->nullable();
            $table->string('sposob_naznaceniya')->nullable();
            $table->string('dopolnitelniy_n_gryzootpravitelya_2')->nullable();
            $table->string('dopolnitelniy_n_gryzootpravitelya_3')->nullable();
            $table->string('rassoyanie')->nullable();
            $table->string('otdel_planirovaniya')->nullable();
            $table->string('period_zagruzki')->nullable();
            $table->string('period_razgruzki')->nullable();
            $table->string('kolonka')->nullable();
            $table->string('start')->nullable();
            $table->string('mesto_naznaceniya')->nullable();
            $table->string('sostoyanie_chteniya')->nullable();
            $table->string('sostoyanie_pechati')->nullable();
            $table->string('data_pogruzki')->nullable();
            $table->string('data_razgryzki')->nullable();
            $table->string('krainiy_srok')->nullable();
            $table->string('gorod_start')->nullable();
            $table->string('nazvanie_kompanii_mesto_naznaceniya')->nullable();
            $table->string('spravochnaya_cena_perevozki')->nullable();
            $table->string('distetcher_gryzootpravitelya')->nullable();
            $table->string('kategorii')->nullable();
            $table->string('region_mesto_naznacheniya')->nullable();
            $table->string('dispetcher_perevozchika')->nullable();
            $table->string('gryzootpravitel')->nullable();
            $table->string('postavki')->nullable();
            $table->string('naznachennie_perevozki')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
