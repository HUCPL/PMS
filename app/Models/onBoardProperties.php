<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\categoryModel;
use App\Models\ownerDetails;
use App\Models\User;
use App\Models\package;
use App\Models\rentPropertyUnit;
use App\Models\subUnits;
use App\Models\PropertyIssues;
class onBoardProperties extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $table = 'on_board_property';
    protected $primaryKey = 'id';
    protected $fillable = [
        'propertyName','propertyCategory','property_for','sqr_meter','sqr_feet','construction_year','renovation_year','rooms','floor','property_utility','outdoor_features','indoor_feature','file_name','file_path','aggrement_start_date','aggrement_end_date','isApproved','aggrement_id','owner_id','remarks','propertyAddress','country','city','zipcode','state','phone','email','near_by','OwnerID','propUniqueID','packagesID'
     ];
     public function masterCategory()
     {
         return $this->hasOne(categoryModel::class,'category_id','propertyCategory');
     }
     public function ownerDetails()
     {
         return $this->hasOne(User::class,'id','OwnerID');
     }
     public function packages()
     {
         return $this->hasOne(package::class,'package_id','packagesID');
     }
     public function units()
     {
        return $this->hasMany(rentPropertyUnit::class,'propertyID','propUniqueID');
     }
     public function subUnits()
     {
        return $this->hasMany(subUnits::class,'propID','propUniqueID');
     }
     public function issues()
     {
        return $this->hasMany(PropertyIssues::class,'propUniqueID','propUniqueID');
     }
}
