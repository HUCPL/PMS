<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\masterFeaturesModel;
use App\Models\outdoorModel;
use App\Models\indoorModel;
use App\Models\propertyDetails;
use App\Models\onBoardProperty;
use App\Models\propertyImages;
use App\Models\propertyVideos;
use App\Models\ownerDetails;
use App\Models\onBoardProperties;
use App\Models\expensesModel;
use App\Models\User;
use Storage;
use Exception;
use App\Events\propertyMail;
use Event;
use Auth;
use View;
use App\Models\permissions;
use App\Models\raiseTicket;
use App\Models\services;
use App\Models\packageServices;
use App\Models\package;
use App\Models\servicePackage;
use App\Models\subServicePackage;
use App\Models\departments;
use DB;
class PackageController extends Controller
{
    public function services()
    {
        try
        {
           $services = packageServices::where('isDeleted',0)->paginate(10);
           $departmentData = departments::get();
           return view('backend.packages.services',compact('services','departmentData'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addServices(request $request)
    {
        try
        {

            $validate = $request->validate([
                'service_name'=>'required',
                'amount'=>'required'
            ]);
            if($validate)
            {
                $exists = packageServices::where('services_name',strtoupper($request->service_name))->exists();
                if($exists)
                {
                    $trash = packageServices::where(['services_name'=>strtoupper($request->service_name),'isDeleted'=>1])->exists();
                    if($trash)
                    {
                        return redirect()->back()->with('adminerror','Services Name already Exists its in trash'); 
                    }else
                    {
                        return redirect()->back()->with('adminerror','Services Name already Exists');
                    }
                }else
                {
                    $data = [
                        'services_name'=>strtoupper($request->service_name),
                        'amount'=>$request->amount
                    ];
                    packageServices::create($data);
                    return redirect()->back()->with('adminsuccess','Services Added Successfully');
                }
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function updateServices(request $request)
    {
        try
        {

            $validate = $request->validate([
                'service_name'=>'required',
                'amount'=>'required'
            ]);
            if($validate)
            {
                    $data = [
                        'services_name'=>strtoupper($request->service_name),
                        'amount'=>$request->amount
                    ];
                    packageServices::where('id',$request->id)->update($data);
                    return redirect()->back()->with('adminsuccess','Services update Successfully');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }

    public function deleteServices($id)
    {
        try
        {
           $delete = packageServices::where('id',$id);
           if($delete)
           {
               $services = $delete->update(['isDeleted'=>1]);
               return redirect()->back()->with('adminsuccess','service delete success');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //Packages Functions
    public function packages()
    {
        try
        {
           $services = services::where('parent_id','=',0)->get();
           $subServices = services::where('parent_id','!=',0)->get();
           $departmentData = departments::get();
           $packages = package::where(['isDeleted'=>0])->paginate(10);
           return view('backend.packages.packages',compact('services','packages','departmentData','subServices'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function packagesList()
    {
        try
        {
           $packages = package::where(['isDeleted'=>0])->paginate(10);
           return view('backend.packages.packageView',compact('packages'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addPackages(request $request)
    {
         try
        {
            $validate = $request->validate([
                'package_name'=>'required',
                'servcies'=>'required',
            ]);
            if($validate)
            {
                $uniqueID = bin2hex(random_bytes(2));
                $exists = package::where('packages_name',strtoupper($request->package_name))->exists();
                if($exists)
                {
                    $trash = package::where(['packages_name'=>strtoupper($request->package_name),'isDeleted'=>1])->exists();
                    if($trash)
                    {
                        return redirect()->back()->with('adminerror','Package Name already Exists its in trash'); 
                    }else
                    {
                        return redirect()->back()->with('adminerror','Packages Name already Exists');
                    }
                }else
                {
                    $data['packages_name'] = strtoupper($request->package_name);
                    $data['services'] = implode(',',$request->servcies);
                    $data['amount'] = $request->amount;
                    $data['provider'] = $request->servicefor;
                    $data['unique_id'] = $uniqueID;
                    if(!empty($request->subservcies))
                    {
                        $data['subServices'] = implode(',',$request->subservcies);
                        foreach ($request->servcies as $srvid) {
                            $datas['id'] = $srvid;
                            $datas['unique_id'] = $uniqueID;
                            if(isset($request->subservcies))
                            {
                                foreach ($request->subservcies as $srvidd) {
                                    $datas['Sub_id'] = $srvidd;
                                    servicePackage::where('parent_id',$srvid)->create($datas);
                                }
                            }
                        }
                    }
                    package::create($data);
                    return redirect()->back()->with('adminsuccess','Packages Added Successfully');
                }
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function deletepackages($id)
    {
        try
        {
           $delete = package::where('package_id',$id);
           if($delete)
           {
               $packages = $delete->update(['isDeleted'=>1]);
               return redirect()->back()->with('adminsuccess','Packages delete success');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function packagesUpdate($id)
    {
        try
        {
           $services = services::where('parent_id','=',0)->get();
           $departmentData = departments::get();
           $packages = package::where(['isDeleted'=>0,'package_id'=>$id])->first();
           $subServices = services::where('parent_id','!=',0)->get();
           return view('backend.packages.update',compact('services','packages','departmentData','subServices'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function updatePackages(request $request)
    {
        try
        {
            
            $validate = $request->validate([
                'package_name'=>'required',
                'servcies'=>'required',
            ]);
            if($validate)
            {
                $data = [
                    'packages_name'=>strtoupper($request->package_name),
                    'services'=>implode(',',$request->servcies),
                    'subServices'=>implode(',',$request->subservcies),
                    'amount'=>$request->amount,
                    'provider'=>$request->servicefor,
                ];
                package::where('package_id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Packages updated Successfully');

            }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
       public function getstate($id)
    { 
        
       $stateData = DB::table('states')->where(['country_id'=>$id])->get();
       echo '<option value="">Select State</option>';
        if($stateData->count()>0){
            foreach($stateData as $item){ ?>
              <option value="<?= $item->id ?>"><?= ucfirst($item->name) ?></option>
            <?php }
        }
    }
    public function getcity($id)
    { 
        
       $stateData = DB::table('cities')->where(['state_id'=>$id])->get();
       echo '<option value="">Select city</option>';
        if($stateData->count()>0){
            foreach($stateData as $item){ ?>
              <option value="<?= $item->name ?>"><?= ucfirst($item->name) ?></option>
            <?php }
        }
    }
}
