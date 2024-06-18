<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\departments;
class services extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
       'services_id','dept_id','service_name','img_name','img_path','for','parent_id','amount','description','service_provider'
    ];
    public function departmaents()
    {
        return $this->hasOne(departments::class,'id','dept_id');
    }
    public function  parentservices()
    {
        return $this->hasOne(services::class,'id','parent_id');
    }
}
