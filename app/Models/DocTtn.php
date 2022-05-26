<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DocTtn extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'doc_ttns';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'id_list_product_id',
        'otpravitel_id',
        'poluchatel_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function id_list_product()
    {
        return $this->belongsTo(Listproduct::class, 'id_list_product_id');
    }

    public function otpravitel()
    {
        return $this->belongsTo(Mycompan::class, 'otpravitel_id');
    }

    public function poluchatel()
    {
        return $this->belongsTo(Zakazchikklient::class, 'poluchatel_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
