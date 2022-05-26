<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RfisAccess extends Model
{
    use HasFactory;

    public $table = 'rfis_access';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $fillable = [
        'rfi_id',
        'partner_id',
        'company_id'
    ];
	
	public function partner(){
         return $this->hasOne(Mycompan::class, 'id', 'partner_id');
    }
	
	public function company(){
		return $this->hasOne(GruzOwner::class, 'id', 'company_id');
	}
	
}
