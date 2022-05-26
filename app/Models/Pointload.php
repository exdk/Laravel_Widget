<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Pointload extends Model implements HasMedia
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use InteractsWithMedia;
    use Auditable;
    use HasFactory;

    public const TYPE_SELECT = [
        '0' => 'Физическое лицо',
        '1' => 'Индивидуальный предприниматель',
        '2' => 'Юридическое лицо',
    ];

    public $table = 'pointloads';

    public static $searchable = [
        'title',
    ];

    protected $appends = [
        'hemaproezda',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'sapid',
        'title',
        'gorod',
        'country_id',
        'zip',
        'region',
        'ulitca',
        'dom',
        'komment',
        'type',
        'komuperevozklient_id',
        'komuzakazklient_id',
        'innfio',
        'fioload',
        'mobileload',
        'created_at',
        'pnot',
        'pndo',
        'pnbrot',
        'pnbrdo',
        'thot',
        'thdo',
        'thbrot',
        'thbrdo',
        'wedot',
        'weddo',
        'wedbrot',
        'wedbrto',
        'thuot',
        'thudo',
        'thubrot',
        'thubrdo',
        'friot',
        'frido',
        'fribrot',
        'fribrdo',
        'satot',
        'satdo',
        'satbrot',
        'satbrdo',
        'sunot',
        'sundo',
        'sunbrot',
        'sunbrdo',
        'holiday',
        'lat',
        'long',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function pointloadZakaznagruzs()
    {
        return $this->hasMany(Zakaznagruz::class, 'pointload_id', 'id');
    }

    public function cloadZakaznagruzs()
    {
        return $this->hasMany(Zakaznagruz::class, 'cload_id', 'id');
    }

     public function point_startLeads()
    {
        return $this->hasMany(Leads::class, 'point_start', 'id');
    }

    public function point_endLeads()
    {
        return $this->hasMany(Leads::class, 'point_end', 'id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function komuperevozklient()
    {
        return $this->belongsTo(Perevozklient::class, 'komuperevozklient_id');
    }

    public function komuzakazklient()
    {
        return $this->belongsTo(Zakazchikklient::class, 'komuzakazklient_id');
    }

    public function getHemaproezdaAttribute()
    {
        $files = $this->getMedia('hemaproezda');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function holidaylis()
    {
        return $this->belongsToMany(Holiday::class);
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
