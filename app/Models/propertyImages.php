<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\onBoardProperty;
class propertyImages extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable=[
     'image_name','image_path','propertyId',
    ];
    public function property()
    {
        return $this->hasOne(onBoardProperty::class,'id','on_board_properties');
    }
}
