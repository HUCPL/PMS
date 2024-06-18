<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoryModel;
use App\Models\masterFeaturesModel;
use App\Models\outdoorModel;
use App\Models\indoorModel;
use App\Models\propertyDetails;
use App\Models\onBoardProperty;
use App\Models\propertyImages;
use App\Models\propertyVideos;
use App\Models\ownerDetails;
use App\Models\onBoardProperties;
use App\Models\User;
use Storage;
use Exception;
use App\Events\propertyMail;
use Event;
use Auth;
use App\Models\permissions;
use View;

class permissionController extends Controller
{
    // public function __construct()
    // {
    //     $prm = permissions::where('user_id',Auth::Id())->first();
    //     View::share('prm',$prm);
    // }
    public function permission()
    {
        try
        {
             $permissionData = permissions::with('users')->paginate(10);
             $usersID = User::get();
             return view('backend.permission.permission')->with(compact('permissionData','usersID'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addPermission(request $request)
    {
        try
        {
            $validate = $request->validate([
                'usersId'=>'required',
                'roleId'=>'required',
                'pages'=>'required'
            ]);
            if($validate)
            {
                $data = [
                  'role_id'=>$request->roleId,
                  'user_id'=>$request->usersId,
                  'page_ID'=>implode(',',$request->pages)
                ];
                permissions::create($data);
                return redirect()->back()->with('adminsuccess','permission granted');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
}
