<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyIssues extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'propUniqueID','property_issues','isActive','isDelete'
    ];
}
