<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\rentPropertyUnit;
use App\Models\onBoardProperties;
class subUnits extends Model
{
    use HasFactory;
    protected $fillable = [
       'appartments','rooms','rooms_no','sqr_meter','sqr_feet','area','bath','features','bhk','isAc','isFurnished','file_name','file_path','isActive','isDeleted','unit_name','unitID','propID','special_features','subUnitID','general_rent','security_deposite','late_fees','adult','child','lease_start_date','lease_end_date','pay_due_date'
    ];
    public function units()
    {
        return $this->hasOne(rentPropertyUnit::class,'id','unitID');
    }
    public function property()
    {
        return $this->hasOne(onBoardProperties::class,'propUniqueID','propID');
    }
}
