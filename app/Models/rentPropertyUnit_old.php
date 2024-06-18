<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\onBoardProperties;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
class rentPropertyUnit extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'propertyID','bed_rooms','bath','kitchen','general_rent','security_deposite','late_fee','adult','child','rent_type','file_name','	file_path'
    ];
    public function properties()
    {
        return hasOne(onBoardProperties::class,'id','propertyID');
    }
}
