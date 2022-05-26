<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Rfi extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;

    public const STATUS_SELECT = [
        '0' => 'не участвовал',
        '1' => 'в процессе',
        '2' => 'участвовал',
        '3' => 'участие отклонено',
        '4' => 'получено распределение',
    ];

    public $table = 'rfis';

    protected $appends = [
        'applications',
    ];

    protected $dates = [
        'start',
        'finish',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'title',
        'start',
        'finish',
        'created_at',
        'letter',
        'limited',
        'contact_id',
        'contact_2_id',
        'id_1_id',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function typetrans()
    {
        return $this->belongsToMany(Transport::class);
    }

    public function access_groups(){
         return $this->hasMany(RfisAccess::class, 'rfi_id');
    }


    public function getFinishAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setFinishAttribute($value)
    {
        $this->attributes['finish'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function getStartAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
    public function getApplicationsAttribute()
    {
        return $this->getMedia('applications');
    }

    public function contact()
    {
        return $this->belongsTo(Contactperson::class, 'contact_id');
    }

    public function contact_2()
    {
        return $this->belongsTo(Contactperson::class, 'contact_2_id');
    }

    public function id_1()
    {
        return $this->belongsTo(Forms::class, 'id_1_id', 'id');
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
