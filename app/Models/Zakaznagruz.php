<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Zakaznagruz extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const DRAFT_RADIO = [
        '1' => 'Черновик',
    ];

    public const PEREZ_SELECT = [
        '0' => '0',
        '1' => '1',
        '2' => '2',
        '3' => '3',
    ];

    public const FINITA_SELECT = [
        '0' => 'Через',
        '1' => 'В точное время',
    ];

    public const NAHALO_SELECT = [
        '0' => 'Сразу публикации',
        '1' => 'В точное время',
    ];

    public const MIN_SELECT = [
        '0'  => '0 мин',
        '15' => '15  имн',
        '30' => '30 мин',
        '45' => '45 мин',
    ];

    public const TYPEOPLATA_RADIO = [
        '0' => 'Наличный расчет',
        '1' => 'Безналичный расчет',
    ];

    public const TYPETORGOV_RADIO = [
        '0' => 'Фикс',
        '1' => 'Запрос',
        '2' => '▲ Аукцион',
        '3' => '▼ Аукцион',
    ];

    public const DOP_3_T_RADIO = [
        '0' => 'Загрузка',
        '1' => 'Выгрузка',
        '2' => 'Ехать через',
        '3' => 'Таможня',
    ];

    public const DOP_4_T_RADIO = [
        '0' => 'Загрузка',
        '1' => 'Выгрузка',
        '2' => 'Ехать через',
        '3' => 'Таможня',
    ];

    public const DOP_5_T_RADIO = [
        '0' => 'Загрузка',
        '1' => 'Выгрузка',
        '2' => 'Ехать через',
        '3' => 'Таможня',
    ];

    public const DOP_1_T_RADIO = [
        '0' => 'Загрузка',
        '1' => 'Разгрузка',
        '2' => 'Ехать через',
        '3' => 'Таможня',
    ];

    public const DOP_2_T_RADIO = [
        '0' => 'Загрузка',
        '1' => 'Разгрузка',
        '2' => 'Ехать через',
        '3' => 'Таможня',
    ];

    public const HOUR_SELECT = [
        '0'  => '0 ч',
        '1'  => '1 ч',
        '2'  => '2 ч',
        '4'  => '4 ч',
        '8'  => '8 ч',
        '12' => '12 ч',
        '24' => '24 ч',
    ];

    public const VALUTA_SELECT = [
        '1' => 'Рубль (₽)',
        '2' => 'Доллар ($)',
        '3' => 'Евро (€)',
        '4' => 'Тенге (₸)',
        '5' => 'Юань (¥)',
    ];

    public const KTOMOGET_RADIO = [
        '0' => 'Все грузоперевозчики',
        '1' => 'Все партнеры',
        '2' => 'Все, кроме черного списка',
        '3' => 'Все, кто из групп',
    ];

    public $table = 'zakaznagruzs';

    protected $dates = [
        'dateload',
        'cdate',
        'nahalodate',
        'finitadate',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'bookmark',
        'draft',
        'sapid',
        'gruz_id',
        'tonnag',
        'unit_id',
        'kubatura',
        'grutype_id',
        'qpack',
        'lendth',
        'width',
        'height',
        'diameter',
        'krugorei',
        'pointload_id',
        'dateload',
        'timeloada',
        'timeloadado',
        'a_24',
        'dopinfoload',
        'cload_id',
        'cdate',
        'ctime',
        'ctimedo',
        'с_24',
        'cdopinfo',
        'ltlftl_id',
        'qauto',
        'adr_id',
        'qbelt',
        'tempot',
        'tempdo',
        'typeoplata',
        'uoviaoplati',
        'typetorgov',
        'tekprice',
        'tart_tena',
        'valuta',
        'bankday',
        'tart_nd',
        'valnd_id',
        'bank_daynd',
        'nal',
        'naldn',
        'nalcard',
        'hagponig',
        'max',
        'dopinfoplata',
        'kurator_1_id',
        'kontaktprim',
        'ktomoget',
        'nahalo',
        'nahalodate',
        'nahalotime',
        'finita',
        'finitadate',
        'finitatime',
        'hour',
        'min',
        'idcomp',
        'iduser',
        'perez',
        'look',
        'kolo',
        'dop_1_t',
        'dop_1_adr',
        'dop_1_tot',
        'dop_1_val_id',
        'dop_1_typ_id',
        'dop_1_tam_id',
        'dop_2_t',
        'dop_2_adr',
        'dop_2_tot',
        'dop_2_val_id',
        'dop_2_typ_id',
        'dop_2_tam_id',
        'dop_3_t',
        'dop_3_adr',
        'dop_3_tot',
        'dop_3_val_id',
        'dop_3_typ_id',
        'dop_3_tam_id',
        'dop_4_t',
        'dop_4_adr',
        'dop_4_tot',
        'dop_4_val_id',
        'dop_4_typ_id',
        'dop_4_tam_id',
        'dop_5_t',
        'dop_5_adr',
        'dop_5_tot',
        'dop_5_val_id',
        'dop_5_typ_id',
        'dop_5_tam_id',
        'di',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function gruz()
    {
        return $this->belongsTo(Gruz::class, 'gruz_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unitma::class, 'unit_id');
    }

    public function grutype()
    {
        return $this->belongsTo(Titilegruz::class, 'grutype_id');
    }

    public function pointload()
    {
        return $this->belongsTo(Pointload::class, 'pointload_id');
    }

    public function getDateloadAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateloadAttribute($value)
    {
        $this->attributes['dateload'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function cload()
    {
        return $this->belongsTo(Pointload::class, 'cload_id');
    }

    public function getCdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setCdateAttribute($value)
    {
        $this->attributes['cdate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function typekuzovs()
    {
        return $this->belongsToMany(Typekuzova::class);
    }

    public function typeloads()
    {
        return $this->belongsToMany(Typeload::class);
    }

    public function type_unloads()
    {
        return $this->belongsToMany(Typeunload::class);
    }

    public function ltlftl()
    {
        return $this->belongsTo(Ltlftl::class, 'ltlftl_id');
    }

    public function trebs()
    {
        return $this->belongsToMany(Trebovan::class);
    }

    public function trandocs()
    {
        return $this->belongsToMany(Trandoc::class);
    }

    public function adr()
    {
        return $this->belongsTo(Adr::class, 'adr_id');
    }

    public function valnd()
    {
        return $this->belongsTo(Valutand::class, 'valnd_id');
    }

    public function kurator_1()
    {
        return $this->belongsTo(User::class, 'kurator_1_id');
    }

    public function kromezakazs()
    {
        return $this->belongsToMany(Zakazgrup::class);
    }

    public function perevozkromes()
    {
        return $this->belongsToMany(PerevozchikPerevoz::class);
    }

    public function getNahalodateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setNahalodateAttribute($value)
    {
        $this->attributes['nahalodate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getFinitadateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setFinitadateAttribute($value)
    {
        $this->attributes['finitadate'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function dop_1_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_1_val_id');
    }

    public function dop_1_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_1_typ_id');
    }

    public function dop_1_tam()
    {
        return $this->belongsTo(Custom::class, 'dop_1_tam_id');
    }

    public function dop_2_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_2_val_id');
    }

    public function dop_2_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_2_typ_id');
    }

    public function dop_2_tam()
    {
        return $this->belongsTo(Custom::class, 'dop_2_tam_id');
    }

    public function dop_3_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_3_val_id');
    }

    public function dop_3_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_3_typ_id');
    }

    public function dop_3_tam()
    {
        return $this->belongsTo(Custom::class, 'dop_3_tam_id');
    }

    public function dop_4_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_4_val_id');
    }

    public function dop_4_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_4_typ_id');
    }

    public function dop_4_tam()
    {
        return $this->belongsTo(Custom::class, 'dop_4_tam_id');
    }

    public function dop_5_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_5_val_id');
    }

    public function dop_5_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_5_typ_id');
    }

    public function dop_5_tam()
    {
        return $this->belongsTo(Custom::class, 'dop_5_tam_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
