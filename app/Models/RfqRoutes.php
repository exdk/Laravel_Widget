<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RfqRoutes extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'rfq_routes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'rfq_id',
        'point_start',
        'point_end',
        'car_type',
        'car_canweight',
        'car_canvalue',
		 'DAP_DDP', 
         'DAP_DDP_code',   
         'lead_time',   
         'сargo_name',  
         'сargo_package',   
         'сargo_package_weight',    
         'value_per_month',
		 'otif',
		 'urgency',
		 'target_rate',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function additional_fields()
    {
        return $this->hasMany(RfqRouteFields::class, 'rfq_route_id', 'id');
    }

    public function point_start_info(){
        return $this->belongsTo(Pointload::class, 'point_start', 'id');
    }

    public function point_end_info(){
        return $this->belongsTo(Pointload::class, 'point_end');
    }
}
