<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AssignedTransport extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'assigned_transports';

    protected $dates = [
        'first_date_loading',
        'created_at',
        'data_pogryzki',
        'data_razgryzki',
        'poslednie_izmeneniya',
        'krayniy_srok',
        'dta_statysa_vtoroe_bronirovanie',
        'statys_data_statysa_yroven_perevozki',
        'data_statysa',
        'zabronirovano_s_vtoroe_bronirovanie',
        'data_naznacheniya',
        'pribitie_vtoroe_bronirovanie',
        'zabronirovano_s',
        'otbitie_vtoroe_bronirovanie',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'first_date_loading',
        'created_at',
        'statys_vtoroe_bronirovanie',
        'tip_pogryzki_vtoroe_bronirovanie',
        'bronirovanie_zabronirovano',
        'status_yroven_perevozki',
        'statys_kem_razmeshcheno_yroven_perevozki',
        'status_yroven_postavki',
        'status_kem_razmeshcheno_yroven_postavki',
        'id_gryppi_perevozok',
        'tip',
        'dopolnitelnie_novera_gryzootpravitelya',
        'dopolnitelniy_n_gryzootpravitelay_2',
        'dopolnitelniy_n_gryzootpravitelya_3',
        'kolonka',
        'start',
        'mesto_naznacheniya',
        'transportnoe_sredstvo_trebovanie',
        'vibrosi_co_2',
        'ves',
        'obem',
        'dlina',
        'pozicii',
        'registracionniy_n',
        'vnytrenniy_kommentariy_k_perevozke',
        'statys',
        'pribitie',
        'otbitie',
        'tip_pogryzki',
        'statysi_razmestit_otslezhivanie_gryza',
        'nazvanie_kompanii_start',
        'gorod_start',
        'gorod_mesto_naznacheniya',
        'nazvanie_kompanii_mesto_naznacheniya',
        'spravochnaya_tsena_perevozki',
        'valyuta_ogovorennoy_tseni_perevozki',
        'n_perevozki',
        'transporeonid',
        'nomera_postavki',
        'id_postavki',
        'kategorii',
        'gryzootpravitel',
        'bronirovaniya_ne_zabronirovano_ypravlenie_vremennimi_oknami',
        'otdel_planirovaniya',
        'dispetcher_gryzootpravitelya',
        'dispetcher_perevozchika',
        'statys_eta',
        'eta_tip',
        'raznitsa_s_eta',
        'postavki',
        'vlozheniya',
        'data_pogryzki',
        'period_zagryzki',
        'data_razgryzki',
        'period_razgryzki',
        'poslednie_izmeneniya',
        'krayniy_srok',
        'otslezhivanie',
        'opredelennie_mesta_zagryzki',
        'pochtoviy_indeks_start',
        'region_start',
        'strana_start',
        'kommentariy_start',
        'dta_statysa_vtoroe_bronirovanie',
        'statys_data_statysa_yroven_perevozki',
        'data_statysa',
        'opredelennie_mesta_razgryzki',
        'pochtoviy_indeks_mesto_naznacheniya',
        'region_mesto_naznacheniya',
        'zabronirovano_s_vtoroe_bronirovanie',
        'data_naznacheniya',
        'strana_mesto_naznacheniya',
        'pribitie_vtoroe_bronirovanie',
        'zabronirovano_s',
        'otbitie_vtoroe_bronirovanie',
        'kommentariy_mesto_naznacheniya',
        'tip_predlozheniya',
        'predlozhenie',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function getFirstDateLoadingAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFirstDateLoadingAttribute($value)
    {
        $this->attributes['first_date_loading'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataPogryzkiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataPogryzkiAttribute($value)
    {
        $this->attributes['data_pogryzki'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataRazgryzkiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataRazgryzkiAttribute($value)
    {
        $this->attributes['data_razgryzki'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPoslednieIzmeneniyaAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPoslednieIzmeneniyaAttribute($value)
    {
        $this->attributes['poslednie_izmeneniya'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getKrayniySrokAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setKrayniySrokAttribute($value)
    {
        $this->attributes['krayniy_srok'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDtaStatysaVtoroeBronirovanieAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDtaStatysaVtoroeBronirovanieAttribute($value)
    {
        $this->attributes['dta_statysa_vtoroe_bronirovanie'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getStatysDataStatysaYrovenPerevozkiAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStatysDataStatysaYrovenPerevozkiAttribute($value)
    {
        $this->attributes['statys_data_statysa_yroven_perevozki'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDataStatysaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataStatysaAttribute($value)
    {
        $this->attributes['data_statysa'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getZabronirovanoSVtoroeBronirovanieAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setZabronirovanoSVtoroeBronirovanieAttribute($value)
    {
        $this->attributes['zabronirovano_s_vtoroe_bronirovanie'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getDataNaznacheniyaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataNaznacheniyaAttribute($value)
    {
        $this->attributes['data_naznacheniya'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPribitieVtoroeBronirovanieAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setPribitieVtoroeBronirovanieAttribute($value)
    {
        $this->attributes['pribitie_vtoroe_bronirovanie'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getZabronirovanoSAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setZabronirovanoSAttribute($value)
    {
        $this->attributes['zabronirovano_s'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getOtbitieVtoroeBronirovanieAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setOtbitieVtoroeBronirovanieAttribute($value)
    {
        $this->attributes['otbitie_vtoroe_bronirovanie'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
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
