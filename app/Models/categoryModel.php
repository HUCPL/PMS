<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class categoryModel extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
       'category_name','category_image','image_path','tags','isFeatured'
    ];
}
