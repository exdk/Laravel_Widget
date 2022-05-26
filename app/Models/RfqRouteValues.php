<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RfqRouteValues extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'rfq_route_values';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'rfq_route_id',
        'quota',
        'tarif',
        'company_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

     public function company()
    {
        return $this->belongsTo(Mycompan::class, 'company_id');
    }
}
