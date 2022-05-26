<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignedDeliveresTable extends Migration
{
    public function up()
    {
        Schema::create('assigned_deliveres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('deliveryid')->nullable();
            $table->string('statusi_razmestit_otslezhivanie_gryza')->nullable();
            $table->string('n_postavki')->nullable();
            $table->string('id_postavki')->nullable();
            $table->string('n_perevozki')->nullable();
            $table->datetime('data_naznacheniya_yroven_perevozki')->nullable();
            $table->string('gryzootpravitel')->nullable();
            $table->string('eta')->nullable();
            $table->string('statys_eta')->nullable();
            $table->string('raznitsa_s_eta')->nullable();
            $table->string('eta_tip')->nullable();
            $table->string('nazvanie_kompanii_mesto_zagryzki')->nullable();
            $table->string('dopolnitelnie_dannie_adresa_mesto_zagryzki')->nullable();
            $table->string('ylitsa_i_nom_doma_mesto_zagryzki')->nullable();
            $table->string('pochtoviy_indeks_mesto_zagryzki')->nullable();
            $table->string('gorod_mesto_zagryzki')->nullable();
            $table->string('region_mesto_zagryzki')->nullable();
            $table->string('strana_mesto_zagryzki')->nullable();
            $table->string('nomer_telefona_dlya_avizo_mesto_zagryzki')->nullable();
            $table->string('kommentariy_mesto_zagryzki')->nullable();
            $table->datetime('data_zagryzki_ot')->nullable();
            $table->datetime('data_zagryzki_do')->nullable();
            $table->string('nazvanie_kompanii_mesto_razgryzki')->nullable();
            $table->string('dopolnitelnie_dannie_adesa_mesto_razgryzki')->nullable();
            $table->string('ylitsa_i_nom_doma_mesto_razgryzki')->nullable();
            $table->string('pochtoviy_indeks_mesto_razgryzki')->nullable();
            $table->string('gorod_mesto_razgryzki')->nullable();
            $table->string('region_mesto_razgryzki')->nullable();
            $table->string('nomer_telefona_dlya_avizo_mesto_razgryzki')->nullable();
            $table->string('kommentariy_mesto_razgryzki')->nullable();
            $table->datetime('data_razgryzki_ot')->nullable();
            $table->datetime('data_razgryzki_do')->nullable();
            $table->string('inkotermsi')->nullable();
            $table->string('inkoterms_gorod')->nullable();
            $table->float('ves', 15, 2)->nullable();
            $table->float('obem', 15, 2)->nullable();
            $table->string('edinitsa_vesa')->nullable();
            $table->string('edinitsa_obema')->nullable();
            $table->float('dlina', 15, 2)->nullable();
            $table->string('edinitsa_dlini')->nullable();
            $table->string('pozichii')->nullable();
            $table->string('transportnoe_sredstvo_trebovanie')->nullable();
            $table->string('registratsionniy_n')->nullable();
            $table->string('transportnie_edinitsi')->nullable();
            $table->string('transpostnaya_edinitsa')->nullable();
            $table->string('klass_opasnih_gryzov_opasnie_gryzi_n')->nullable();
            $table->string('kommentariy_k_postavke')->nullable();
            $table->string('statys_yroven_postavki_otslezhivanie_gryza')->nullable();
            $table->date('statys_statys_data_yroven_postavki_otslezhivanie_gryza')->nullable();
            $table->string('statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza')->nullable();
            $table->string('statys_kommentariy_yroven_postavki_otslezhivanie_gryza')->nullable();
            $table->string('vlozheniya')->nullable();
            $table->string('poslednie_izmeneniya')->nullable();
            $table->string('transporeon_id_yroven_perevozki')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
