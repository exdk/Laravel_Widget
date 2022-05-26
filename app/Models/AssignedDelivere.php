<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignedDelivere extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'assigned_deliveres';

    protected $dates = [
        'created_at',
        'data_naznacheniya_yroven_perevozki',
        'data_zagryzki_ot',
        'data_zagryzki_do',
        'data_razgryzki_ot',
        'data_razgryzki_do',
        'statys_statys_data_yroven_postavki_otslezhivanie_gryza',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'deliveryid',
        'created_at',
        'statusi_razmestit_otslezhivanie_gryza',
        'n_postavki',
        'id_postavki',
        'n_perevozki',
        'data_naznacheniya_yroven_perevozki',
        'gryzootpravitel',
        'eta',
        'statys_eta',
        'raznitsa_s_eta',
        'eta_tip',
        'nazvanie_kompanii_mesto_zagryzki',
        'dopolnitelnie_dannie_adresa_mesto_zagryzki',
        'ylitsa_i_nom_doma_mesto_zagryzki',
        'pochtoviy_indeks_mesto_zagryzki',
        'gorod_mesto_zagryzki',
        'region_mesto_zagryzki',
        'strana_mesto_zagryzki',
        'nomer_telefona_dlya_avizo_mesto_zagryzki',
        'kommentariy_mesto_zagryzki',
        'data_zagryzki_ot',
        'data_zagryzki_do',
        'nazvanie_kompanii_mesto_razgryzki',
        'dopolnitelnie_dannie_adesa_mesto_razgryzki',
        'ylitsa_i_nom_doma_mesto_razgryzki',
        'pochtoviy_indeks_mesto_razgryzki',
        'gorod_mesto_razgryzki',
        'region_mesto_razgryzki',
        'nomer_telefona_dlya_avizo_mesto_razgryzki',
        'kommentariy_mesto_razgryzki',
        'data_razgryzki_ot',
        'data_razgryzki_do',
        'inkotermsi',
        'inkoterms_gorod',
        'ves',
        'obem',
        'edinitsa_vesa',
        'edinitsa_obema',
        'dlina',
        'edinitsa_dlini',
        'pozichii',
        'transportnoe_sredstvo_trebovanie',
        'registratsionniy_n',
        'transportnie_edinitsi',
        'transpostnaya_edinitsa',
        'klass_opasnih_gryzov_opasnie_gryzi_n',
        'kommentariy_k_postavke',
        'statys_yroven_postavki_otslezhivanie_gryza',
        'statys_statys_data_yroven_postavki_otslezhivanie_gryza',
        'statys_kem_razmescheno_yroven_postavki_otslezhivanie_gryza',
        'statys_kommentariy_yroven_postavki_otslezhivanie_gryza',
        'vlozheniya',
        'poslednie_izmeneniya',
        'transporeon_id_yroven_perevozki',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function getDataNaznacheniyaYrovenPerevozkiAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataNaznacheniyaYrovenPerevozkiAttribute($value)
    {
        $this->attributes['data_naznacheniya_yroven_perevozki'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataZagryzkiOtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataZagryzkiOtAttribute($value)
    {
        $this->attributes['data_zagryzki_ot'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataZagryzkiDoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataZagryzkiDoAttribute($value)
    {
        $this->attributes['data_zagryzki_do'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataRazgryzkiOtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataRazgryzkiOtAttribute($value)
    {
        $this->attributes['data_razgryzki_ot'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataRazgryzkiDoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataRazgryzkiDoAttribute($value)
    {
        $this->attributes['data_razgryzki_do'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getStatysStatysDataYrovenPostavkiOtslezhivanieGryzaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStatysStatysDataYrovenPostavkiOtslezhivanieGryzaAttribute($value)
    {
        $this->attributes['statys_statys_data_yroven_postavki_otslezhivanie_gryza'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
