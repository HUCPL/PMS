<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\onBoardProperty;
class propertyVideos extends Model
{
    use HasFactory;
    protected $fillable = [
        'videos_name','videos_path','propertyId',
    ];
    public function property()
    {
        return $this->hasOne(onBoardProperty::class,'id','on_board_properties');
    }
}
