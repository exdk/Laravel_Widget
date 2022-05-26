<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upravlenie extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'upravlenies';

    protected $dates = [
        'created_at',
        'datestart',
        'date_fin',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'mainauto_id',
        'prizep_id',
        'driver_id',
        'created_at',
        'driver_2_id',
        'datestart',
        'date_fin',
        'timetart',
        'time_fin',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function mainauto()
    {
        return $this->belongsTo(Auto::class, 'mainauto_id');
    }

    public function prizep()
    {
        return $this->belongsTo(Auto::class, 'prizep_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function driver_2()
    {
        return $this->belongsTo(Driver::class, 'driver_2_id');
    }

    public function getDatestartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatestartAttribute($value)
    {
        $this->attributes['datestart'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateFinAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateFinAttribute($value)
    {
        $this->attributes['date_fin'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
