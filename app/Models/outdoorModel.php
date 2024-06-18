<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\categoryModel;
class outdoorModel extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'outdoor_name','master_category','tags','imageName','imagePath'
    ];
    public function masterCategory()
    {
        return $this->hasOne(categoryModel::class,'category_id','master_category');
    }
}
