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

class PartnerBb extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;

    public const STATUS_SELECT = [
        '0' => 'Действующий',
        '1' => 'Закончен',
    ];

    public const TYPEDOGOVOR_SELECT = [
        '0' => 'Прямой клиентский',
        '1' => 'Прямой транспртный',
        '2' => 'Прямой экспедиторский',
    ];

    public $table = 'partner_bbs';

    protected $appends = [
        'dogovor_copy',
    ];

    protected $dates = [
        'dogovor_start',
        'dogovor_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'partner_id',
        'typedogovor',
        'dogovor_number',
        'dogovor_start',
        'dogovor_end',
        'valuta_id',
        'description',
        'contactperson',
        'telefon',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function partner()
    {
        return $this->belongsTo(Mycompan::class, 'partner_id');
    }

    public function getDogovorStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDogovorStartAttribute($value)
    {
        $this->attributes['dogovor_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDogovorEndAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDogovorEndAttribute($value)
    {
        $this->attributes['dogovor_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function valuta()
    {
        return $this->belongsTo(Valutum::class, 'valuta_id');
    }

    public function getDogovorCopyAttribute()
    {
        return $this->getMedia('dogovor_copy')->last();
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
