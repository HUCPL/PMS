<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class propertyDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'sqr_meter','sqr_feet','construction_date','next_renovation','rooms','floor'
    ];
}
