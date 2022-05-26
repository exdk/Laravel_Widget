<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quotes extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'quotes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lead_id',
        'user_id',
        'driver_id',
        'avto_id',
        'transporter_company',
        'quote_type',
        'price',
        'price_currency',
        'distribution_type',
        'status',
        'comment',
        'parrent_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function quote(){
        return $this->belongsTo(Leads::class, 'lead_id');
    }

    public function driver(){
        return $this->belongsTo(Driver::class, 'driver_id');
    }

    public function avto(){
        return $this->belongsTo(Auto::class, 'avto_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
