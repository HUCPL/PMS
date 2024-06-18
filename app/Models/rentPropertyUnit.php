<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\onBoardProperties;
class rentPropertyUnit extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'propertyID','unit_name','bed_rooms','bath','kitchen','general_rent','security_deposite','late_fee','adult','child','rent_type','lease_start_date','lease_end_date','pay_due_date','file_name','file_path','propid'
    ];
    public function property()
    {
        return $this->hasOne(onBoardProperties::class,'propUniqueID','propertyID');
    }
}
