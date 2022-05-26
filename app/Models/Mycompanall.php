<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Mycompanall extends Model implements HasMedia
{
    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const TYPENALOG_SELECT = [
        '1' => 'с НДС',
        '0' => 'Без НДС',
    ];

    public const TYPEDEJAT_SELECT = [
        '0' => 'ГСМ и нефтепродукты',
        '1' => 'Оптовая торговля',
        '2' => 'Организация перевозок',
        '3' => 'Производство',
        '4' => 'Розничная торговля',
        '5' => 'Сельское хозяйство',
        '6' => 'Строительство',
    ];

    public $table = 'mycompans';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $appends = [
        'logo',
        'utav',
        'doveren',
        'filedog',
        'newfil',
        'newfill',
        'newfilll',
    ];

    protected $fillable = [
        'hortname',
        'longname',
        'main_id',
        'oporg',
        'datet',
        'typedejat',
        'direktor',
        'uradres',
        'factadr',
        'telefonorg',
        'orgmobile',
        'web',
        'email',
        'typenalog',
        'innkpp',
        'kpp',
        'innogrn',
        'bik',
        'bank',
        'rathet',
        'korhet',
        'reitopen',
        'reiin',
        'geogorod',
        'note',
        'created_at',
        'updated_at',
        'deleted_at',
        'team_id',
        'autoftl',
        'autoltl',
        'autoload',
        'morebulk',
        'morefcl',
        'morelcl',
        'railway',
        'river',
        'delivery',
        'avia',
        'coastal',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function main()
    {
        return $this->belongsTo(Mycompan::class, 'main_id');
    }

    public function getLogoAttribute()
    {
        $file = $this->getMedia('logo')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function typecomps()
    {
        return $this->belongsToMany(Typecompany::class);
    }

    public function typeperevozs()
    {
        return $this->belongsToMany(Typeperevoz::class);
    }

    public function megdus()
    {
        return $this->belongsToMany(Country::class);
    }

    public function getUtavAttribute()
    {
        return $this->getMedia('utav')->last();
    }

    public function getDoverenAttribute()
    {
        return $this->getMedia('doveren')->last();
    }

    public function getFiledogAttribute()
    {
        return $this->getMedia('filedog')->last();
    }

    public function getNewfilAttribute()
    {
        return $this->getMedia('newfil')->last();
    }

    public function getNewfillAttribute()
    {
        return $this->getMedia('newfill')->last();
    }

    public function getNewfilllAttribute()
    {
        return $this->getMedia('newfilll');
    }


//added

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }


//added
/*
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }*/

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
