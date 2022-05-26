<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offering extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'offerings';

    protected $dates = [
        'date_first_load',
        'deystvitelno_do',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'date_first_load',
        'transporeonid',
        'neobhodimie_perevozki',
        'procent_kvoti_vipolneno',
        'poslednie_izmeneniya',
        'opredelennie_mesta_zagryzki',
        'poctoviy_indeks_start',
        'region_start',
        'strana_start',
        'kommentariy_start',
        'opredelennie_mesta_razgryzki',
        'poctoviy_indeks_mesto_naznaceniya',
        'strana_mesto_naznaceniya',
        'kommentariy_mesto_naznaceniya',
        'predlozheniya',
        'predlozhenie',
        'tip_predlozheniya',
        'deystvitelno_do',
        'kommentarii_k_predlozheniyu',
        'transportnoe_sredstvo_trebovanie',
        'ves',
        'obem',
        'dlina',
        'pozicii',
        'vnutrenniy_kommentariy_k_perevozke',
        'id_gryppi_perevozok',
        'dopolnitelnie_nomera_gryzootpravitelya',
        'sposob_naznaceniya',
        'dopolnitelniy_n_gryzootpravitelya_2',
        'dopolnitelniy_n_gryzootpravitelya_3',
        'rassoyanie',
        'otdel_planirovaniya',
        'period_zagruzki',
        'period_razgruzki',
        'kolonka',
        'start',
        'mesto_naznaceniya',
        'sostoyanie_chteniya',
        'sostoyanie_pechati',
        'data_pogruzki',
        'data_razgryzki',
        'krainiy_srok',
        'gorod_start',
        'nazvanie_kompanii_mesto_naznaceniya',
        'spravochnaya_cena_perevozki',
        'distetcher_gryzootpravitelya',
        'kategorii',
        'region_mesto_naznacheniya',
        'dispetcher_perevozchika',
        'gryzootpravitel',
        'postavki',
        'naznachennie_perevozki',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function getDateFirstLoadAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateFirstLoadAttribute($value)
    {
        $this->attributes['date_first_load'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDeystvitelnoDoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDeystvitelnoDoAttribute($value)
    {
        $this->attributes['deystvitelno_do'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
