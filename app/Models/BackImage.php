<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BackImage extends Model
{
    use HasFactory;
    protected $fillable = [
        'propUniqueID','file_name','file_path','isActive','isDeleted'
    ];
}
