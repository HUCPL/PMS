<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
class indoorModel extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'indoor_name','master_category','tags','imageName','imagePath'
    ];
    public function masterCategory()
    {
        return $this->hasOne(categoryModel::class,'category_id','master_category');
    }
}
