<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sUspecialFeatures extends Model
{
    use HasFactory;
    protected $fillable = [
        'subUnitID','features'
    ];
}
