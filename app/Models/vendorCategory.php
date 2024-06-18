<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\brandModel;
class vendorCategory extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'categoryName','ParentCategoryID','Description','file_name','file_path','Active/Inactive','brandID'
    ];
    public function  parentCategory()
    {
       return $this->hasOne(vendorCategory::class,'CategoryID','ParentCategoryID');
    }
    public function brandName()
    {
       return $this->hasone(brandModel::class,'brandID','brandID');
    }
}
