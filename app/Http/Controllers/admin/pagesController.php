<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoryModel;
use Storage;
use Exception;
use View;
use App\Models\permissions;
use App\Models\onBoardProperties;
use App\Models\ticketModel;
use Auth;
class pagesController extends Controller
{
    
    public function dashboard()
    {
        if(Auth::user()->role_as == 5)
        {
            $Propertycount = onBoardProperties::where('OwnerID',Auth::Id())->count();
            $approvedcount = onBoardProperties::where(['OwnerID'=>Auth::Id(),'isApproved'=>0])->count();
            $disapprovedcount = onBoardProperties::where(['OwnerID'=>Auth::Id(),'isApproved'=>2])->count();
            $underreviews = onBoardProperties::where(['OwnerID'=>Auth::Id(),'isApproved'=>1])->count();
            return view('backend.layout.dashboard',compact('Propertycount','approvedcount','disapprovedcount','underreviews'));
        }elseif(Auth::user()->role_as == 10)
        {
            $Propertycount = onBoardProperties::count();
            $approvedcount = onBoardProperties::where(['isApproved'=>0])->count();
            $disapprovedcount = onBoardProperties::where(['isApproved'=>2])->count();
            $underreviews = onBoardProperties::where(['isApproved'=>1])->count();
            return view('backend.layout.dashboard',compact('Propertycount','approvedcount','disapprovedcount','underreviews'));
        }elseif (Auth::user()->role_as == 4) {
            $Propertycount = ticketModel::count();
            return view('backend.layout.dashboard',compact('Propertycount'));
        }elseif (Auth::user()->role_as == 2) {
            $Propertycount = onBoardProperties::with('masterCategory')->where(['city'=>Auth::user()->city])->count();
            $approvedcount = onBoardProperties::where(['city'=>Auth::user()->city,'isApproved'=>0])->count();
            $disapprovedcount = onBoardProperties::where(['city'=>Auth::user()->city,'isApproved'=>2])->count();
            $underreviews = onBoardProperties::where(['city'=>Auth::user()->city,'isApproved'=>1])->count();
            return view('backend.layout.dashboard',compact('Propertycount','approvedcount','disapprovedcount','underreviews'));
        }else
        {
            $Propertycount = 0;
        }
        return view('backend.layout.dashboard',compact('Propertycount'));
    }  
    
}
