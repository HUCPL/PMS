<?php

namespace App\Http\Controllers\rentalys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\onBoardProperties;
use Auth;
use Storage;
class propertyList extends Controller
{
    public function propertyList()
    {
         $properties =  onBoardProperties::where(['isApproved'=>0,'property_for'=>0])->paginate(10);
         return view('rentalys.pages.propertyList')->with(compact('properties'));
    }
}
