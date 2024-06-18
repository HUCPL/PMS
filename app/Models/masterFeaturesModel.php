<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\categoryModel;
class masterFeaturesModel extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'features_name','master_category','features_description','tags'
    ];
    public function masterCategory()
    {
        return $this->hasOne(categoryModel::class,'category_id','master_category');
    }
}
