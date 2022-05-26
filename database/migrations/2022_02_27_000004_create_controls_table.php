<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateControlsTable extends Migration
{
    public function up()
    {
        Schema::create('controls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('i_dgruza')->nullable();
            $table->string('load_reference_3')->nullable();
            $table->string('voditeli')->nullable();
            $table->string('statys_otobrazheniay')->nullable();
            $table->datetime('data_i_vremay_nachala')->nullable();
            $table->string('adres_otpravleniya')->nullable();
            $table->string('adres_mesta_naznacheniay')->nullable();
            $table->string('poslednee_sobitie')->nullable();
            $table->string('nazvanie_pynkta_naznacheniay')->nullable();
            $table->string('tip_oborydovaniay_treiler')->nullable();
            $table->string('nomer_tyagacha')->nullable();
            $table->datetime('data_vremya_zaversheniya')->nullable();
            $table->string('identifikator_reisa')->nullable();
            $table->string('kolichestvo_edinich')->nullable();
            $table->string('kolichestvo_osnovnih_ostanovok')->nullable();
            $table->string('ves_kg')->nullable();
            $table->string('kontaktnoe_lico')->nullable();
            $table->string('nomer_zakaza_postavshika_sirya_i_mat')->nullable();
            $table->string('nomer_posledovatelnosti_reisov')->nullable();
            $table->string('klient')->nullable();
            $table->string('nomer_treilera')->nullable();
            $table->string('obem_cu_m')->nullable();
            $table->string('ostanovki_v_tranzite')->nullable();
            $table->string('poddoni_dlya_perevozki_gryzov')->nullable();
            $table->string('primechanie')->nullable();
            $table->string('rassoyanie_km')->nullable();
            $table->string('imya_klienta')->nullable();
            $table->string('gorod_otpravleniya')->nullable();
            $table->string('gorod_naznacheniya')->nullable();
            $table->string('identifikator_bronirovaniya')->nullable();
            $table->string('opisanie_tipa_transporta_treiler')->nullable();
            $table->string('stoimost_zakaza_rub')->nullable();
            $table->string('nomer_otslezhivaniya_gryza')->nullable();
            $table->datetime('phakticheskaya_data_nachala_pogryzki')->nullable();
            $table->string('load_reference_1')->nullable();
            $table->string('identifikator_pynkta_otpravleniya')->nullable();
            $table->string('identifikator_pynkta_naznacheniya')->nullable();
            $table->string('tovar')->nullable();
            $table->string('registracionnii_kod_18')->nullable();
            $table->string('auction')->nullable();
            $table->string('load_reference_2')->nullable();
            $table->string('pod_load_group')->nullable();
            $table->string('pod_status')->nullable();
            $table->string('sap_shipment_document_number')->nullable();
            $table->string('adres_mesta_otpravleniya_sydna')->nullable();
            $table->string('adres_mesta_pribitiya_sydna')->nullable();
            $table->string('adres_svyazannogo_mesta_otpravleniya')->nullable();
            $table->string('vklychit_v_cislo_ispolzovanii_resyrsa')->nullable();
            $table->string('vladelec_treilera')->nullable();
            $table->string('vladelec_tyagacha')->nullable();
            $table->string('vnytrennii_n_zakaza_perevozchika')->nullable();
            $table->string('vigryzka_bez_voditelya')->nullable();
            $table->datetime('data_i_vremya_obnovleniya')->nullable();
            $table->datetime('data_i_vremya_sozdaniya')->nullable();
            $table->datetime('data_vremya_konteinernogo_sklada')->nullable();
            $table->datetime('datetimestartship')->nullable();
            $table->datetime('datetimearriveship')->nullable();
            $table->string('data_vremya_ocenki')->nullable();
            $table->string('deklarirovannaya_stoimost')->nullable();
            $table->string('identifikator_mesta_otpravlenia_sydna')->nullable();
            $table->string('identifikator_mesta_pribitiya_sydna')->nullable();
            $table->string('identifikator_mesta_prpiski_treilera')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
