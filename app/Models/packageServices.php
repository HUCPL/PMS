<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services;
class packageServices extends Model
{
    use HasFactory;
    protected $fillable = [
      'services_name','amount','isDeleted'
    ];
    public function services()
    {
       return $this->hasOne(services::class,'id','service_id');
    }
}
