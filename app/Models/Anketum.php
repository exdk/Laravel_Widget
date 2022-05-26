<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anketum extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public const EDO_RADIO = [
        '1' => 'Да',
        '0' => 'Нет',
    ];

    public const GPS_RADIO = [
        '1' => 'Да',
        '0' => 'Нет',
    ];

    public const GARANT_RADIO = [
        '1' => 'Да',
        '0' => 'Нет',
    ];

    public const GPSDOSTUP_RADIO = [
        '1' => 'Да',
        '0' => 'Нет',
    ];

    public const FAKTORING_RADIO = [
        '1' => 'Да',
        '0' => 'Нет',
    ];

    public const DOLYASIBUR_SELECT = [
        '1' => 'Менее 10%',
        '2' => '10-30%',
        '3' => '30-50 %',
        '4' => '50% и более',
    ];

    public const DAVNO_SELECT = [
        '1' => '1 год и менее',
        '2' => 'от 1 до 3-х лет',
        '3' => 'более 3-х лет',
    ];

    public const SIBURSTATUS_SELECT = [
        '1' => 'Сибур - один из лучших грузоотправителей',
        '2' => 'Сибур - средний грузоотправитель',
        '3' => 'Сибур- хуже среднего грузоотправитель',
    ];

    public $table = 'anketa';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'inn',
        'contactperson',
        'contactdol',
        'contactemail',
        'contactmobile',
        'auto',
        'dolya',
        'autoage',
        'qtyotgruzok',
        'qtypersonal',
        'qtydrivers',
        'targetservice',
        'onlinetender',
        'onlineauto',
        'edo',
        'gps',
        'gpsdostup',
        'total',
        'garant',
        'toplivo',
        'faktoring',
        'davno',
        'opit',
        'dolyasibur',
        'siburstatus',
        'attractive',
        'better',
        'tools',
        'best',
        'created_at',
        'titleanketa',
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
