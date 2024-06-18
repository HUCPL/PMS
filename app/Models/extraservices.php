<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\onBoardProperties;
use App\Models\packageServices;
class extraservices extends Model
{
    use HasFactory;
    protected $fillable = [
       'propertyID','serviceID','subServicesID','isDeleted'
    ];
    public function properties()
    {
        return $this->hasOne(onBoardProperties::class,'id','propertyID');
    }
    public function services()
    {
        return $this->hasOne(packageServices::class,'id','serviceID');
    }
    
}
