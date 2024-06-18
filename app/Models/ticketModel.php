<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Dyrynda\Database\Support\CascadeSoftDeletes;
use App\Models\onBoardProperties;
use App\Models\User;
use App\Models\departments;
use App\Models\services;
class ticketModel extends Model
{
    use HasFactory;
    use SoftDeletes,CascadeSoftDeletes;
    protected $fillable = [
      'TicketID','propertyID','customberID','departmentID','status','Priority','submit_by','AssignTo','description','Notes_Comments','	attachement_name','attachement_path','resolution','reOpened_date','reOpened_reason','feedback_rating','servicesID','categoryID'
    ];
    //Property Details
    public function propertyDetails()
    {
        return $this->hasOne(onBoardProperties::class,'id','propertyID');
    }
    //customber Details
    public function customberDetails()
    {
        return $this->hasOne(User::class,'id','customberID');
    }
    //superVisor Details
    public function superVisorDetails()
    {
        return $this->hasOne(User::class,'id','AssignTo');
    }
    //departments 
    public function departments()
    {
        return $this->hasOne(departments::class,'id','categoryID');
    }
    //services 
    public function services()
    {
        return $this->hasOne(services::class,'id','servicesID');
    }
}
