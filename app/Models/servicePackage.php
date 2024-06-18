<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\services;
use App\Models\package;
class servicePackage extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','unique_id','isDelete','Sub_id'
    ];
}
