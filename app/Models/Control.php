<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Control extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'controls';

    protected $dates = [
        'data_i_vremay_nachala',
        'data_vremya_zaversheniya',
        'phakticheskaya_data_nachala_pogryzki',
        'data_i_vremya_obnovleniya',
        'data_i_vremya_sozdaniya',
        'data_vremya_konteinernogo_sklada',
        'datetimestartship',
        'datetimearriveship',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'i_dgruza',
        'load_reference_3',
        'voditeli',
        'statys_otobrazheniay',
        'data_i_vremay_nachala',
        'adres_otpravleniya',
        'adres_mesta_naznacheniay',
        'poslednee_sobitie',
        'nazvanie_pynkta_naznacheniay',
        'tip_oborydovaniay_treiler',
        'nomer_tyagacha',
        'data_vremya_zaversheniya',
        'identifikator_reisa',
        'kolichestvo_edinich',
        'kolichestvo_osnovnih_ostanovok',
        'ves_kg',
        'kontaktnoe_lico',
        'nomer_zakaza_postavshika_sirya_i_mat',
        'nomer_posledovatelnosti_reisov',
        'klient',
        'nomer_treilera',
        'obem_cu_m',
        'ostanovki_v_tranzite',
        'poddoni_dlya_perevozki_gryzov',
        'primechanie',
        'rassoyanie_km',
        'imya_klienta',
        'gorod_otpravleniya',
        'gorod_naznacheniya',
        'identifikator_bronirovaniya',
        'opisanie_tipa_transporta_treiler',
        'stoimost_zakaza_rub',
        'nomer_otslezhivaniya_gryza',
        'phakticheskaya_data_nachala_pogryzki',
        'load_reference_1',
        'identifikator_pynkta_otpravleniya',
        'identifikator_pynkta_naznacheniya',
        'tovar',
        'registracionnii_kod_18',
        'auction',
        'load_reference_2',
        'pod_load_group',
        'pod_status',
        'sap_shipment_document_number',
        'adres_mesta_otpravleniya_sydna',
        'adres_mesta_pribitiya_sydna',
        'adres_svyazannogo_mesta_otpravleniya',
        'vklychit_v_cislo_ispolzovanii_resyrsa',
        'vladelec_treilera',
        'vladelec_tyagacha',
        'vnytrennii_n_zakaza_perevozchika',
        'vigryzka_bez_voditelya',
        'data_i_vremya_obnovleniya',
        'data_i_vremya_sozdaniya',
        'data_vremya_konteinernogo_sklada',
        'datetimestartship',
        'datetimearriveship',
        'data_vremya_ocenki',
        'deklarirovannaya_stoimost',
        'identifikator_mesta_otpravlenia_sydna',
        'identifikator_mesta_pribitiya_sydna',
        'identifikator_mesta_prpiski_treilera',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDataIVremayNachalaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataIVremayNachalaAttribute($value)
    {
        $this->attributes['data_i_vremay_nachala'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataVremyaZaversheniyaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataVremyaZaversheniyaAttribute($value)
    {
        $this->attributes['data_vremya_zaversheniya'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getPhakticheskayaDataNachalaPogryzkiAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPhakticheskayaDataNachalaPogryzkiAttribute($value)
    {
        $this->attributes['phakticheskaya_data_nachala_pogryzki'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataIVremyaObnovleniyaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataIVremyaObnovleniyaAttribute($value)
    {
        $this->attributes['data_i_vremya_obnovleniya'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataIVremyaSozdaniyaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataIVremyaSozdaniyaAttribute($value)
    {
        $this->attributes['data_i_vremya_sozdaniya'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataVremyaKonteinernogoSkladaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataVremyaKonteinernogoSkladaAttribute($value)
    {
        $this->attributes['data_vremya_konteinernogo_sklada'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDatetimestartshipAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDatetimestartshipAttribute($value)
    {
        $this->attributes['datetimestartship'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDatetimearriveshipAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDatetimearriveshipAttribute($value)
    {
        $this->attributes['datetimearriveship'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
