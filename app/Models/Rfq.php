<?php

namespace App\Models;

use \DateTimeInterface;
//use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Rfq extends Model implements HasMedia
{
    use SoftDeletes;
   // use MultiTenantModelTrait;
    use InteractsWithMedia;
    use HasFactory;

    public const TYPE_RADIO = [
        '0' => 'Реальный',
        '1' => 'Спот',
    ];

    public const STATUS_SELECT = [
        '0' => 'не участвовал',
        '1' => 'в процессе',
        '2' => 'участвовал',
        '3' => 'участие отклонено',
        '4' => 'получено распределение',
    ];

    public $table = 'rfqs';

    protected $appends = [
        'applications',
    ];

    protected $dates = [
        'start',
        'finish',
        'created_at',
        'datestartdogovor',
        'dateenddogovor',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'status',
        'title',
        'start',
        'finish',
        'type',
        'created_at',
        'limited',
        'datestartdogovor',
        'dateenddogovor',
        'contact_id',
        'contact_2_id',
        'desc',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

   public function rfq_routes(){
        return $this->hasMany(RfqRoutes::class, 'rfq_id', 'id')
                    ->join('pointloads as point_begin', 'point_begin.id', '=', 'rfq_routes.point_start')
                    ->join('pointloads as point_end', 'point_end.id', '=', 'rfq_routes.point_end')
                    ->select('rfq_routes.*', 'point_begin.title AS point_begin_title', 'point_end.title as point_end_title');
    }

    public function routes_additional_fields(){
        return $this->hasMany(RfqRouteFields::class, 'rfq_id', 'id');
    } 


    public function rfqRfqnapravlenies()
    {
        return $this->hasMany(Rfqnapravlenie::class, 'rfq_id', 'id');
    }

    public function rfqVisiblility()
    {
        return $this->hasMany(Visibility::class, 'item_id', 'id')
                    ->leftJoin('mycompans as company', 'company.id', '=', 'visibility.company_id')
                    ->leftJoin('users as user', 'user.id', '=', 'visibility.user_id')
                    ->select('visibility.*', 'company.hortname as company_name', 'user.surname as user_surname', 'user.name as user_name', 'user.oth as user_oth')
                    ->where('visibility.item_type', '=', '0')
                    ->orderBy('visibility.company_id', 'DESC');
    }



    public function rfqRfqcountries()
    {
        return $this->hasMany(Rfqcountry::class, 'rfq_id', 'id');
    }

    public function typetrs()
    {
        return $this->belongsToMany(Transport::class);
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
    public function getDatestartdogovorAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatestartdogovorAttribute($value)
    {
        $this->attributes['datestartdogovor'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateenddogovorAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateenddogovorAttribute($value)
    {
        $this->attributes['dateenddogovor'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
