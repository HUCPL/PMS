<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\categoryModel;
use App\Models\ownerDetails;
class onBoardProperty extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
       'propertyName','propertyCategory','property_for','sqr_meter','sqr_feet','construction_year','renovation_year','rooms','floor','property_utility','outdoor_features','indoor_feature','file_name','file_path','aggrement_start_date','aggrement_end_date','isApproved','aggrement_id','remarks','propertyAddress','country','city','zipcode','state','phone','email','near_by','propUniqueID','insp_file_name','insp_file_path'
    ];
    public function masterCategory()
    {
        return $this->hasOne(categoryModel::class,'category_id','propertyCategory');
    }
    public function ownerDetails()
    {
        return $this->hasOne(ownerDetails::class,'id','OwnerID');
    }
}
