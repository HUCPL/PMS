<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
class ownerDetails extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = 
    [
        'ownerName',
        'country',
        'state',
        'city',
        'zipcode',
        'address',
        'email',
        'phone',
        'OwnerId',
        'image_name',
        'image_path',
    ];
   
}
