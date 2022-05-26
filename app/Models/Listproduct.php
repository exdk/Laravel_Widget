<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listproduct extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'listproducts';

    public static $searchable = [
        'id_vnutr',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_vnutr',
        'title_id',
        'quantity',
        'type_pack',
        'unitcount',
        'type_pack_tr_id',
        'tr_quan',
        'type_pal_id',
        'qua_pal',
        'total_quant',
        'total_weight',
        'total_sum',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function title()
    {
        return $this->belongsTo(Product::class, 'title_id');
    }

    public function type_pack_tr()
    {
        return $this->belongsTo(Typepack::class, 'type_pack_tr_id');
    }

    public function type_pal()
    {
        return $this->belongsTo(TypePalet::class, 'type_pal_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
