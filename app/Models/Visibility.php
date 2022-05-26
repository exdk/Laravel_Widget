<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visibility extends Model
{
    use HasFactory;

    public $table = 'visibility';

      protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    /*
        item_type
        0 - RFQ
        1 - RFI 
    */

    protected $fillable = [
        'item_type',
        'item_id',
        'company_id',
        'user_id',
        'vtype',
        'created_at',
        'updated_at',
        'deleted_at'
 
    ];
	
	public function company()
	{
		return $this->hasOne(MyCompan::class, "id", "company_id");
	}


}