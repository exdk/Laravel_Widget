<?php

namespace App\Models;

use \DateTimeInterface;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Auto extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use HasFactory;

    public const KOLO_RADIO = [
        '1' => '6x2',
        '2' => '8x2',
        '3' => '10x2',
    ];

    public const ENGINE_TYPE_RADIO = [
        '1' => 'Дизель',
        '2' => 'Бензин',
    ];

    public const OWN_RADIO = [
        '1' => 'Собственность',
        '2' => 'Лизинг',
        '3' => 'Субподряд',
    ];

    public const TYPE_KUZOV_RADIO = [
        '1' => 'Грузовик',
        '2' => 'Тягач',
        '3' => 'Полуприцеп',
        '4' => 'Прицеп',
    ];

    public const TYPE_KABIN_RADIO = [
        '1' => '2-х местная с 1 спальным',
        '2' => '1-местная с 1 спальным',
        '3' => '2-х местная с 2 спальным',
    ];

    public $table = 'autos';

    public static $searchable = [
        'marka',
        'model',
        'vin',
        'type_kuzov',
        'year_ot',
    ];

    protected $appends = [
        'pt_perv',
        'pt_vtor',
    ];

    protected $dates = [
        'pt_date',
        'ob_date_ot',
        'ka_date_ot',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'own',
        'own_inn',
        'govnomer',
        'marka',
        'model',
        'vin',
        'type_kuzov',
        'category_tc',
        'year_ot',
        'color',
        'horse',
        'ecoclass',
        'pt_type',
        'pt_nomer',
        'max_nagruz',
        'beznagruz',
        'pt_date',
        'registry',
        'kolo',
        'bakov',
        'bakov_volume',
        'bakov_volume_2',
        'levelco_2',
        'vnutr_dlina',
        'vnutr_weight',
        'vnutr_height',
        'vnutr_kub',
        'holod',
        'temp_ot',
        'temp_do',
        'type_tahograf',
        'fuel',
        'gidrolift',
        'koniki',
        'ekmt',
        'remni',
        'palet',
        'type_kabin',
        'engine_type',
        'volume',
        'gruzopod',
        'dogruz',
        'operator_gps',
        'nomer_dat_gps',
        'nomer_mac',
        'rozisk',
        'zalog',
        'htraf_gibdd',
        'ob_type',
        'op_nemer',
        'ob_date_ot',
        'ka_type',
        'ka_nomer',
        'ka_date_ot',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPtDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPtDateAttribute($value)
    {
        $this->attributes['pt_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPtPervAttribute()
    {
        $file = $this->getMedia('pt_perv')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getPtVtorAttribute()
    {
        $file = $this->getMedia('pt_vtor')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function typeloads()
    {
        return $this->belongsToMany(Typeload::class);
    }

    public function adrs()
    {
        return $this->belongsToMany(Adr::class);
    }

    public function getObDateOtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setObDateOtAttribute($value)
    {
        $this->attributes['ob_date_ot'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getKaDateOtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setKaDateOtAttribute($value)
    {
        $this->attributes['ka_date_ot'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
