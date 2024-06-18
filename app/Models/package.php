<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\packageServices;
use App\Models\services;
class package extends Model
{
    use HasFactory;
    protected $fillable = [
      'packages_name','services','package_type','amount','unique_id','isDeleted','provider','subServices'
    ];

}
