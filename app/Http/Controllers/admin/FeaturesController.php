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
use App\Models\rentPropertyUnit;
use App\Models\expensesModel;
use Storage;
use Exception;
use App\Events\propertyMail;
use Event;
use View;
use App\Models\permissions;
use Auth;
use App\Models\ticketModel;
use App\Models\propertyUnit;
use App\Models\services;
use App\Models\package;
use App\Models\packageServices;
use App\Models\subUnits;
use App\Models\subUnitFeatures;
use App\Models\sUspecialFeatures;
use App\Models\departments;
use Session;
use App\Models\PropertyIssues;
use App\Models\UnitFeatures;
class FeaturesController extends Controller
{
    public function features()
    {
        try
        {
            $features = UnitFeatures::paginate(10);
            return view('backend.features.features',compact('features'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function featuresTrashList()
    {
        try
        {
            $features = UnitFeatures::onlyTrashed()->paginate(10);
            return view('backend.features.trash',compact('features'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function saveFeatures(request $request)
    {
        try
        {
            $validate = $request->validate([
                'featurename'=>'required'
            ],
            [
                'featurename.required' => 'Feature Name is Must'
            ]);
            if($validate)
            {
                $exists = UnitFeatures::where(['Features_Name'=>strtolower($request->featurename)])->exists();
                if($exists)
                {
                  return redirect()->back()->with('adminerror','Features Name Already Exist');
                }else
                {

                    $data['Features_Name'] = strtolower($request->featurename);
                    $data['isSpecialFeature'] = $request->isSpecial;
                    UnitFeatures::create($data);
                    return redirect()->back()->with('adminsuccess','Features Add Successfully');
                }
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function updateFeatures(request $request)
    {
        try
        {
            $validate = $request->validate([
                'featurename'=>'required'
            ],
            [
                'featurename.required' => 'Feature Name is Must'
            ]);
            if($validate)
            {
                $data['Features_Name'] = $request->featurename;
                $data['isSpecialFeature'] = $request->isSpecial;
                UnitFeatures::where('id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Features Edited Successfully');
            }
        }catch(Exception $e)
        {
             return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function deleteFeature($id)
    {
        try
        {
           $delete = UnitFeatures::where('id',$id);
           if($delete)
           {
              $delete = $delete->delete();
              return redirect()->back()->with('adminsuccess','Feature Move To Trash Succesfully');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function deleteForceFeature($id)
    {
        try
        {
           $delete = UnitFeatures::where('id',$id);
           if($delete)
           {
              $delete = $delete->forceDelete();
              return redirect()->back()->with('adminsuccess','Feature Deleted Permanently succesfully');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //Restore Features featuresRestore
    public function featuresRestore($id)
    {
        try
        {
           $delete = UnitFeatures::where('id',$id);
           if($delete)
           {
              $delete = $delete->restore();
              return redirect()->back()->with('adminsuccess','Feature Restore Succesfully');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    // features list function  according to filter
    public function featuresFilter($key)
    {
        try
        {
            if($key == 0)
            {
                $features = UnitFeatures::paginate(10);
            }else if($key == 1)
            {
                $features = UnitFeatures::where(['isSpecialFeature'=> 0])->paginate(10);
            }else if($key == 2)
            {
                $features = UnitFeatures::where(['isSpecialFeature'=> 1])->paginate(10);
            }
            return view('backend.features.FeatuesList',compact('features'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
}
