<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuotesQueue extends Model
{
    use HasFactory;

    public $table = 'quotes_queue';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lead_id',
        'company_id',
        'point_start',
        'point_end',
        'user_id',
        'cancel_time',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function point_start(){
        return $this->belongsTo(Pointload::class, 'point_start');
    }

    public function point_end(){
        return $this->belongsTo(Pointload::class, 'point_end');
    }

    public function transporter_company(){
        return $this->belongsTo(Mycompan::class, 'company_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
