<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gruz extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'gruzs';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'kor',
        'gruz',
        'di',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function gruzZakaznagruzs()
    {
        return $this->hasMany(Zakaznagruz::class, 'gruz_id', 'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
