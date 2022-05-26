<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uncomfirmed extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'uncomfirmeds';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'transpareon',
        'created_at',
        'kolonka',
        'transportnoe_sredstvo_trebovanie',
        'ves',
        'obem',
        'dlina',
        'pozicii',
        'strana_mesto_naznacheniya',
        'vnutrenniy_kommentariy_k_perevozke',
        'id_gryppi_perevozok',
        'dopolnitelnie_nomera_gryzootpravitelya',
        'dopolnitelniy_n_gryzootpravitelya_2',
        'pochtoviy_indeks_mesto_naznacheniya',
        'dopolnitelniy_n_gryzootpravitelya_3',
        'kategorii',
        'dispetcher_gryzootpravitelya',
        'pochtoviy_indeks_start',
        'region_start',
        'strana_start',
        'kommentariy_start',
        'otdel_planirovaniya',
        'period_zagryzki',
        'period_razgryzki',
        'start',
        'mesto_naznacheniya',
        'krainiy_srok',
        'rassoyanie',
        'sostoyanie_chteniya',
        'sostoyanie_pechati',
        'transporeonid',
        'gryzootpravitel',
        'postavki',
        'data_pogryzki',
        'data_razgryzki',
        'poslednie_izmeneniya',
        'opredelennie_mesta_zagryzki',
        'nazvanie_kompanii_start',
        'gorod_start',
        'opredelennie_mesta_razgryzki',
        'nazvanie_kompanii_mesto_naznacheniya',
        'gorod_mesto_naznacheniya',
        'spravochnaya_cena_perevozki',
        'region_mesto_naznacheniya',
        'kommentariy_mesto_naznacheniya',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
