<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use App\Models\permissions;
use Auth;
class helpDeskController extends Controller
{
    // public function __construct()
    // {
    //     $prm = permissions::where('user_id',Auth::Id())->first();
    //     View::share('prm',$prm);
    // }
    public function helpDesk()
   {
     return view('backend.pages.support.demo');
   }
}
