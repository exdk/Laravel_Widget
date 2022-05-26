<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Forms extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'forms';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
	
	public function user()
	{
		return $this->hasOne(User::class, 'id', 'user_id');
	}
	
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
