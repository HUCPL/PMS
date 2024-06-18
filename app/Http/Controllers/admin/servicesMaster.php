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
use App\Models\departments;
use App\Models\services;
use App\Models\User;
use App\Models\assignSPD;
use App\Events\propertyMail;
use Storage; 
use Exception;
use Event;
use View;
use App\Models\permissions;
use App\Models\ticketModel;
use Auth;
class servicesMaster extends Controller
{
    
    public function department()
    {
        try
        {
             $departmentData = departments::paginate(10);
             return view('backend.servicesMaster.department')->with(compact('departmentData'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addDepartment(request $request)
    {
         try
         {
               $validate = $request->validate([
                   'dept_name'=>'required'
               ]);
               if($validate)
               {
                  $nameExist = departments::where('dept_name',$request->dept_name)->exists();
                  if($nameExist)
                  {
                     return redirect()->back()->with('adminerror','name already exist');
                  }else
                  {
                     $data= [
                          'dept_name'=> $request->dept_name,
                          'dept_ID'=>'DEPT_ID_'.strtoupper(bin2hex(random_bytes(4))),
                     ];
                     departments::create($data);
                     return redirect()->back()->with('adminsuccess','Department created Successfully');
                  }
               }

         }catch(Exception $e)
         {
            return redirect()->back()->with('adminerror',$e->getmessage());
         }
    }
    public function deleteDepartment($id)
    {
        try
        {
             $delete = departments::where('id',$id)->delete();
             $ticketdelete = ticketModel::where('categoryID',$id);
             if($ticketdelete)
             {
                $ticketdelete = $ticketdelete->delete();
             }
             $servicedelete = services::where('dept_id',$id)->delete();
             
             return redirect()->back()->with('adminsuccess','Department Deleted Successfully');
        }catch(Exception $e)
        {
            return rediret()->back()->with('adminerror','something went wrong');
        }
    }
    public function updateDepartment(request $request)
    {
        try
        {
            $validate = $request->validate([
                'dept_name'=>'required'
            ]);
            if($validate)
            {

                $data = [
                    'dept_name'=>$request->dept_name,
                ];
                departments::where('id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Successfully changed');
            }
            
        }catch(Exception $e)
        {
             return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    // Services functions
    public function services()
    {
        try
        {
             $servicesData = services::with('departmaents','parentservices')->paginate(10);
             $servicess = services::with('departmaents','parentservices')->get();
             $departmentData = departments::get();
             return view('backend.servicesMaster.services')->with(compact('servicesData','departmentData','servicess'));
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
                'servicesname'=>'required',
                'dept_id'=>'required',
                'servicefor'=>'required',
                'description'=>'required'
              ]);
              if($validate)
              {
                  $servicesExist = services::where(['service_name'=>strtoupper($request->servicesname),'dept_id'=>$request->dept_id])->exists();
                  if($servicesExist)
                  {
                     return redirect()->back()->with('adminerror','services alerady exists');
                  }else
                  {
                     if($request->hasfile('servicesImage'))
                     {
                         $image = $request->file('servicesImage');
                        $imageExtension = $image->getClientOriginalExtension();
                        $imageName = bin2hex(random_bytes(2)).'.'.$imageExtension;
                        \Storage::putFileAs('public/uploads/images',$image,$imageName);
                        $url = \Storage::url('uploads/images').'/'.$imageName;
                        $data = [
                                    'services_id' => 'SERVICES_ID_'.strtoupper(bin2hex(random_bytes(4))),
                                    'dept_id'=>$request->dept_id,
                                    'service_name'=>strtoupper($request->servicesname), 
                                    'for'=>$request->servicefor,
                                    'img_path' => $url,
                                    'img_name' => $imageName,
                            ];
                        
                    }else
                    {

                        $data = [
                                'services_id' => 'SERVICES_ID_'.strtoupper(bin2hex(random_bytes(4))),
                                'dept_id'=>$request->dept_id,
                                'for'=>$request->servicefor,
                                'parent_id'=>$request->parent,
                                'amount'=>$request->amount,
                                'service_name'=>strtoupper($request->servicesname), 
                                'description'=>$request->description,
                                'service_provider'=>$request->servicefor
                            ];
                    }
                    services::create($data);
                    return redirect()->back()->with('adminsuccess','service add successfully');
                  }
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
             $delete = services::where('id',$id)->delete();
             $deleteserviceID = ticketModel::where('servicesID',$id)->delete();
             if($deleteserviceID)
             {
                $deleteserviceID = $deleteserviceID->delete();
             }
             return redirect()->back()->with('adminsuccess','Service Deleted Successfully');
        }catch(Exception $e)
        {
            return rediret()->back()->with('adminerror','something went wrong');
        }
    }
    public function updateServices(request $request)
    {
        try
          {
              $validate = $request->validate([
                'servicesname'=>'required',
                'dept_id'=>'required',
                'servicefor'=>'required'
              ]);
              if($validate)
              {
                
                     if($request->hasfile('servicesImage'))
                     {
                        $image = $request->file('servicesImage');
                        $imageExtension = $image->getClientOriginalExtension();
                        $imageName = bin2hex(random_bytes(2)).'.'.$imageExtension;
                        \Storage::putFileAs('public/uploads/images',$image,$imageName);
                        $url = \Storage::url('uploads/images').'/'.$imageName;
                        $data = [
                                'dept_id'=>$request->dept_id,
                                'service_name'=>strtoupper($request->servicesname), 
                                'for'=>$request->servicefor,
                                'parent_id'=>$request->parent,
                                'amount'=>$request->amount,
                                'description'=>$request->description,
                                'img_path' => $url,
                                'img_name' => $imageName,
                                
                            ];
                        
                    }else
                    {

                        $data = [
                                'dept_id'=>$request->dept_id,
                                'service_name'=>strtoupper($request->servicesname), 
                                'for'=>$request->servicefor,
                                'parent_id'=>$request->parent,
                                'amount'=>$request->amount,
                                'description'=>$request->description,
                            ];
                    }
                    services::where('id',$request->id)->update($data);
                    return redirect()->back()->with('adminsuccess','service updated successfully');
               
              }

          }catch(Exception $e)
          {
             return redirect()->back()->with('adminerror',$e->getmessage());
          }
    }
    //Assign Services and properties
    public function Assign()
    {
        try
        {
           $assignDetails = assignSPD::with('properties','services','departments')->paginate(10);
           $property = onBoardProperties::where('isApproved',0)->get();
           $departments = departments::get();
           $supervisors = User::where('role_as',7)->get();
           $servicess = services::get();
           return view('backend.servicesMaster.assign')->with(compact('assignDetails','property','departments','servicess','supervisors'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //ajax functions servicebydepartment
    public function servicebydept($id)
    {
        try
        {
           $servicess = services::where('dept_id',$id)->get();
           foreach ($servicess as $servicesssitems) {
              echo '<option value="'.$servicesssitems->id.'">'.$servicesssitems->service_name.'</option>';
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //ajax functions end here
    public function addAssign(request $request)
    {
         try
         {
            $validate =  $request->validate([
                'propertyID'=>'required',
                'dept'=>'required',
                'services'=>'required',
            ]);
            if($validate)
            {
                $data = [
                  'propertyID'=>$request->propertyID,
                  'deptID'=>$request->dept,
                  'servicesID'=>$request->services,
                  'superVisorID'=>$request->superVisiorID
                ];
                assignSPD::create($data);
                return redirect()->back()->with('adminsuccess','services assign to  property successfully');
            }
         }catch(Exception $e)
         {
             return redirect()->back()->with('adminerror','something went wrong');
         }
    }
    public function deleteAssign($id)
    {
        try
        {
             $delete = assignSPD::where('id',$id)->delete();
             return redirect()->back()->with('adminsuccess','assign delte successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function updateAssign(request $request)
    {
        try
        {
            // dd($request->all());
            if(empty($request->services))
            {

                $data = [
                    'propertyID'=>$request->propertyID,
                    'deptID'=>$request->dept,
                    'superVisorID'=>$request->superVisiorID
                  ];
            }else
            {
                $data = [
                    'propertyID'=>$request->propertyID,
                    'deptID'=>$request->dept,
                    'servicesID'=>$request->services,
                    'superVisorID'=>$request->superVisiorID
                  ];
            }
              assignSPD::where('id',$request->id)->update($data);
              return redirect()->back()->with('adminsuccess','Assigned Services  Updated Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }

}
