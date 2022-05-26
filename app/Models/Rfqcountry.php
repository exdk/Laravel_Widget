<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rfqcountry extends Model
{
    use SoftDeletes;
    use MultiTenantModelTrait;
    use HasFactory;

    public $table = 'rfqcountries';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'created_at',
        'rfq_id',
        'apoint_id',
        'bpoint_id',
        'lead_time',
        'otif',
        'good_id',
        'pack_id',
        'pack_weight',
        'qty',
        'qty_auto',
        'additional',
        'target',
        'price',
        'garant',
        'comment',
        'updated_at',
        'deleted_at',
        'team_id',
    ];

    public function rfq()
    {
        return $this->belongsTo(Rfq::class, 'rfq_id');
    }

    public function apoint()
    {
        return $this->belongsTo(Apoint::class, 'apoint_id');
    }

    public function bpoint()
    {
        return $this->belongsTo(Bpoit::class, 'bpoint_id');
    }

    public function good()
    {
        return $this->belongsTo(Good::class, 'good_id');
    }

    public function pack()
    {
        return $this->belongsTo(Pack::class, 'pack_id');
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
