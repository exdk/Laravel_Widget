<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leads extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'leads';

    public const CURRENCY = [
        '1' => 'Рубль (₽)',
        '2' => 'Доллар ($)',
        '3' => 'Евро (€)',
        '4' => 'Тенге (₸)',
        '5' => 'Юань (¥)',
    ];

    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id',
        'status',
        'perevoz_type',
        'gruz_title',
        'gruz_package',
        'gruz_weight',
        'gruz_value',
        'gruz_documents',
        'gruz_company_id',
        'gruz_company_dispatcher',
        'postavka_id',
        'postavka_number',
        'point_start',
        'loading_time',
        'point_end',
        'unloading_time',
        'date_start',
        'date_end',
        'transport_type_id',
        'transport_canweight',
        'transport_value',
        'comment',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function quote(){
        return $this->hasOne(Quotes::class, 'lead_id', 'id');
    }


    public function point_start(){
        return $this->belongsTo(Pointload::class, 'point_start');
    }

    public function point_end(){
        return $this->belongsTo(Pointload::class, 'point_end');
    }

    public function gruz_company(){
        return $this->belongsTo(Mycompan::class, 'gruz_company_id');
    }

    public function gruz_company_dispatcher(){
        return $this->belongsTo(User::class, 'gruz_company_dispatcher');
    }

   public function transport_comapny(){
        return $this->hasOneThrough(Mycompan::class, Quotes::class,  'lead_id', 'id', 'id', 'transporter_company' );
   }

   public function driver(){
        return $this->hasOneThrough(Driver::class, Quotes::class, 'lead_id', 'id', 'id', 'driver_id' );
   }

   public function avto(){
        return $this->hasOneThrough(Auto::class, Quotes::class, 'lead_id', 'id', 'id', 'avto_id');
   }
   

    public function getDdate_startAttribute($value){
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDdate_startAttribute($value){
        $this->attributes['date_start'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDdate_endAttribute($value){
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDdate_endAttribute($value){
        $this->attributes['date_end'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date){
        return $date->format('Y-m-d H:i:s');
    }
}
