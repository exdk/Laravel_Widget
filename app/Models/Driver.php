<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Driver extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public $table = 'drivers';

    public static $searchable = [
        'fam',
        'pa_ty',
        'pa_nomer',
        'nomervu',
        'inn',
        'email',
        'mobile_a',
        'mobile_b',
        'medb_nomer',
        'medb_date_ot',
    ];

    protected $appends = [
        'photodriver',
        'pa_perv',
        'pa_vtor',
        'vu_perv',
        'vu_vtor',
        'inn_photo',
        'pfr_perv',
        'medb_perv',
    ];

    protected $dates = [
        'date',
        'pa_date',
        'pro_vr_date_ot',
        'pro_vr_date_do',
        'datevu',
        'medb_date_ot',
        'trud_date_ot',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'fam',
        'name',
        'oth',
        'date',
        'birth_place',
        'pa_ty',
        'pa_nomer',
        'pachecked',
        'pa_date',
        'pa_kod',
        'pa_by',
        'adr_pro',
        'pro_date',
        'pro_vr_adr',
        'pro_vr_date_ot',
        'pro_vr_date_do',
        'nomervu',
        'vuchecked',
        'datevu',
        'byvu',
        'vu_gorod',
        'taho',
        'inn',
        'pfr',
        'email',
        'mobile_a',
        'mobile_b',
        'medb_nomer',
        'medb_typ',
        'medb_date_ot',
        'trud_nomer',
        'trud_date_ot',
        'trud_dol',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPhotodriverAttribute()
    {
        $file = $this->getMedia('photodriver')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPaDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPaDateAttribute($value)
    {
        $this->attributes['pa_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPaPervAttribute()
    {
        $file = $this->getMedia('pa_perv')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getPaVtorAttribute()
    {
        $file = $this->getMedia('pa_vtor')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getProVrDateOtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setProVrDateOtAttribute($value)
    {
        $this->attributes['pro_vr_date_ot'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getProVrDateDoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setProVrDateDoAttribute($value)
    {
        $this->attributes['pro_vr_date_do'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDatevuAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatevuAttribute($value)
    {
        $this->attributes['datevu'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getVuPervAttribute()
    {
        $file = $this->getMedia('vu_perv')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getVuVtorAttribute()
    {
        $file = $this->getMedia('vu_vtor')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getInnPhotoAttribute()
    {
        $file = $this->getMedia('inn_photo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getPfrPervAttribute()
    {
        $file = $this->getMedia('pfr_perv')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getMedbDateOtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMedbDateOtAttribute($value)
    {
        $this->attributes['medb_date_ot'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMedbPervAttribute()
    {
        $files = $this->getMedia('medb_perv');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function getTrudDateOtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setTrudDateOtAttribute($value)
    {
        $this->attributes['trud_date_ot'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
