<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\User;
class permissions extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'roleID','page_routes','page_name','page_ID','Level_position','user_id','role_id'
    ];
    public function users()
    {
      return $this->hasOne(User::class,'id','user_id');
    }
}
