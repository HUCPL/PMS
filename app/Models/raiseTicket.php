<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
class raiseTicket extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'ticketID','proppertyID','cusID','Message','file_name','file_path','servicesID ','owner_id','setPriority'
    ];
    public function propertyName()
    {
        return $this->hasOne(onBoardProperties::class,'id','proppertyID');
    }
}
