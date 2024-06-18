<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\onBoardProperties;
use App\Models\services;
use App\Models\departments;
use App\Models\User;
class assignSPD extends Model
{
    use HasFactory;
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'propertyID',
      'deptID',
      'servicesID',
      'superVisorID',
    ];
    public function properties()
    {
      return $this->hasOne(onBoardProperties::class,'id','propertyID');
    }
    public function services()
    {
      return $this->hasOne(services::class,'id','servicesID');
    }
    public function departments()
    {
      return $this->hasOne(departments::class,'id','deptID');
    }
    public function superVisor()
    {
      return $this->hasOne(User::class,'id','superVisorID');
    }
}
