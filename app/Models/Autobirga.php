<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autobirga extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const READYLOAD_RADIO = [
        '1' => 'готова к загрузке (с сегодняшнего дня + 2 дня)',
        '2' => 'с',
        '3' => 'постоянно',
    ];

    public const AUTOTYPE_RADIO = [
        'polupricep' => 'полуприцеп',
        'gruzovik'   => 'грузовик',
        'scepka'     => 'сцепка',
        'bus'        => 'малотоннажка',
    ];

    public $table = 'autobirgas';

    protected $dates = [
        'dateload',
        'dateloadplu',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'typekuz_id',
        'autotype',
        'loverh',
        'lobok',
        'lozad',
        'lopoln',
        'lopop',
        'lotoiki',
        'lovorot',
        'logidrobort',
        'loapp',
        'lobreh',
        'lobort',
        'loboko',
        'dogruz',
        'hydrolift',
        'koniki',
        'gruzoton',
        'volume',
        'length',
        'width',
        'height',
        'lengthpri',
        'widthpri',
        'heightpri',
        'tir',
        'ekmt',
        'fromcou_id',
        'fromzip',
        'fromregion',
        'fromcity',
        'fromulitca',
        'fromdom',
        'fromlong',
        'fromlat',
        'fromrad',
        'tocou',
        'tozip',
        'toregion',
        'tocity',
        'toulitca',
        'todom',
        'tolong',
        'tolat',
        'torad',
        'dop_1_adr',
        'dop_1_rad',
        'dop_1_tot',
        'dop_1_val_id',
        'dop_1_typ_id',
        'dop_2_adr',
        'dop_2_rad',
        'dop_2_tot',
        'dop_3_adr',
        'dop_2_val_id',
        'dop_2_typ_id',
        'dop_3_rad',
        'dop_3_tot',
        'dop_3_val_id',
        'dop_3_typ_id',
        'dop_4_adr',
        'dop_4_rad',
        'dop_4_tot',
        'dop_4_val_id',
        'dop_4_typ_id',
        'dop_5_adr',
        'dop_5_rad',
        'dop_5_tot',
        'dop_5_val_id',
        'dop_5_typ_id',
        'dop_6_adr',
        'dop_6_rad',
        'dop_6_tot',
        'dop_6_val_id',
        'dop_6_typ_id',
        'dop_7_adr',
        'dop_7_rad',
        'dop_7_tot',
        'dop_7_val_id',
        'dop_7_typ_id',
        'dop_8_adr',
        'dop_8_rad',
        'dop_8_tot',
        'dop_8_val_id',
        'dop_8_typ_id',
        'dop_9_adr',
        'dop_9_rad',
        'dop_9_tot',
        'dop_9_typ_id',
        'dop_9_val_id',
        'dop_10_adr',
        'dop_10_rad',
        'dop_10_tot',
        'dop_10_val_id',
        'dop_10_typ_id',
        'readyload',
        'dateload',
        'dateloadplu',
        'type_load_id',
        'oplatanal',
        'oplataval_id',
        'oplatawithnds',
        'oplatanonds',
        'dopinfo',
        'contact_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function typekuz()
    {
        return $this->belongsTo(Typekuzova::class, 'typekuz_id');
    }

    public function typeloads()
    {
        return $this->belongsToMany(Typeload::class);
    }

    public function adrs()
    {
        return $this->belongsToMany(Adr::class);
    }

    public function fromcou()
    {
        return $this->belongsTo(Country::class, 'fromcou_id');
    }

    public function dop_1_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_1_val_id');
    }

    public function dop_1_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_1_typ_id');
    }

    public function dop_2_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_2_val_id');
    }

    public function dop_2_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_2_typ_id');
    }

    public function dop_3_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_3_val_id');
    }

    public function dop_3_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_3_typ_id');
    }

    public function dop_4_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_4_val_id');
    }

    public function dop_4_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_4_typ_id');
    }

    public function dop_5_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_5_val_id');
    }

    public function dop_5_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_5_typ_id');
    }

    public function dop_6_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_6_val_id');
    }

    public function dop_6_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_6_typ_id');
    }

    public function dop_7_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_7_val_id');
    }

    public function dop_7_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_7_typ_id');
    }

    public function dop_8_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_8_val_id');
    }

    public function dop_8_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_8_typ_id');
    }

    public function dop_9_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_9_typ_id');
    }

    public function dop_9_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_9_val_id');
    }

    public function dop_10_val()
    {
        return $this->belongsTo(Valutum::class, 'dop_10_val_id');
    }

    public function dop_10_typ()
    {
        return $this->belongsTo(Typeolpatum::class, 'dop_10_typ_id');
    }

    public function getDateloadAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateloadAttribute($value)
    {
        $this->attributes['dateload'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateloadpluAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateloadpluAttribute($value)
    {
        $this->attributes['dateloadplu'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function type_load()
    {
        return $this->belongsTo(Autotypload::class, 'type_load_id');
    }

    public function oplataval()
    {
        return $this->belongsTo(Valutum::class, 'oplataval_id');
    }

    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
