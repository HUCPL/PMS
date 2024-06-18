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
use App\Models\expensesModel;
use App\Models\User;
use Storage;
use Exception;
use Event;
use Auth;
use View;
use App\Events\propertyMail;
use App\Events\raisedTicket;
use App\Models\permissions;
use App\Models\ticketModel;
use App\Models\services;
use App\Models\departments;
use App\Models\rentPropertyUnit;
use App\Models\subUnits;
class ticketController extends Controller
{
    public function raiseTicket()
    {
        try
        {
            if(Auth::user()->role_as == 4 || Auth::user()->role_as == 10)
            {
                $ticketDetails = ticketModel::where('assigned',0)->with('propertyDetails','customberDetails','superVisorDetails')->paginate(10);
                $ticketpropcity =  ticketModel::with('propertyDetails','customberDetails','superVisorDetails')->pluck('propertyID')->toArray();
                $propertycity = onBoardProperties::whereIn('id',$ticketpropcity)->pluck('city')->toArray();
                $superVisorNear = User::whereIn('city',$propertycity)->where('role_as',7)->get();
                $propertyDetails = onBoardProperties::get();
                $expensesProperties = expensesModel::select('propertyID')->with('Owner','propertyName')->get();
                $departments = services::get();
                $services = services::get();
                return view('backend.ticket.helpdesk')->with(compact('ticketDetails','propertyDetails','expensesProperties','services','departments','superVisorNear'));
            }elseif(Auth::user()->role_as == 5)
            {
                $ticketDetails = ticketModel::with('propertyDetails','customberDetails','superVisorDetails')->where('customberID',Auth::Id())->paginate(10);
                $propertyDetails = onBoardProperties::where('OwnerID',Auth::Id())->get();
                $expensesProperties = expensesModel::select('propertyID')->with('Owner','propertyName')->get();
                $departments = services::get();
                $services = services::get();
                return view('backend.ticket.raiseTicket')->with(compact('ticketDetails','propertyDetails','expensesProperties','services','departments'));
            }
            

        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    //ajax fetch department function 
    public function fetchDepartMents($id)
    {
        try
        {
             $fetchServices = departments::where('id',$id)->get();
             foreach ($fetchServices as $valueServices) {
                 echo '<option value="'.$valueServices->id.'">'.$valueServices->service_name.'</option>';
             }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','sommething went wrong');
        }
    }
    public function subServices($id)
    {
        try
        {
             $fetchServices = services::where('parent_id',$id)->get();
             foreach ($fetchServices as $valueServices) {
                 echo '<div class="col-lg-3 col-md-4 rmv"><input type="checkbox" name="subservcies[]" id="subs'.$valueServices->id.'" class="proputl srvcheck subservices" value="'.$valueServices->id.'"/><label for="subs'.$valueServices->id.'"  class="label">'.$valueServices->service_name.'</label></div>
                 <input type="hidden" class="parent_id" value="'.$valueServices->parent_id.'">
                 <input type="hidden" class="subamount" value="'.$valueServices->amount.'">';
             }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','sommething went wrong');
        }
    }
    //ajax controller end here 
    public function addTicket(request $request)
    {
        try
        {
            // dd($request->all());
           $validate = $request->validate([
              'propertyID'=>'required',
              'departments'=>'required',
              'services'=>'required',
              'fileAttachment'=>'required',
              'message'=>'required'
           ]);
           if($validate)
           {
               if($request->hasfile('fileAttachment'))
               {
                 $image = $request->file('fileAttachment');
                 $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                 \Storage::putFileAs('public/ticketattachements',$image,$imageName);
                 $url = \Storage::url('ticketattachements').'/'.$imageName;
               }
               $ticketNo =  strtoupper(bin2hex(random_bytes(2)));
              $data = [
                'TicketID' =>$ticketNo,
                'propertyID'=>$request->propertyID,
                'categoryID'=>$request->departments,
                'servicesID'=>$request->services,
                'customberID'=>$request->customberID,
                'attachement_name'=>$imageName,
                'attachement_path'=>$url,
                'description'=> $request->message,
                'status'=>0
              ];
              $helpdeskDetails = User::where('role_as',4)->pluck('email')->toArray();
              $customberDetails = User::where('id',$request->customberID)->first();
              $customberMail = [
                'Name'=>$customberDetails->name,
                'title'=>'Hi',
                'Email'=>$customberDetails->email,
                'ccEmail'=>$helpdeskDetails,
                'subject'=>'Ticket Raised',
                'TicketNo'=>$ticketNo,
                'messagess'=>$request->message,
                'Message'=>'you have Successfully raised ticket successfully. Pms Will contact you soon and resolve your issue',
              ];
              $helpdeskMail = [
                'Name'=>$customberDetails->name,
                'title'=>'raised By',
                'Email'=>'kamalsainiofficals@gmail.com',
                'ccEmail'=>$helpdeskDetails,
                'subject'=>'New Ticket',
                'TicketNo'=>$ticketNo,
                'messagess'=>$request->message,
                'Message'=>'Users raised New ticket',
              ];
              Event::dispatch(new propertyMail($customberMail));
            //   Event::dispatch(new propertyMail($helpdeskMail));
              ticketModel::create($data);
              $ticketData =ticketModel::with('propertyDetails','customberDetails','superVisorDetails','departments','services')->where('TicketID',$ticketNo)->first(); 
              Event::dispatch(new raisedTicket($ticketData));
              return redirect()->back()->with('adminsuccess','Ticket Raised Successfully');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //End Here
    public function deleteTicket($id)
    {
        try
        {
             $delete = ticketModel::where('id',$id)->delete();
             return redirect()->back()->with('adminsuccess','Ticket deleted Successfully ');
        }catch(Exception $e)
        {
             return redirect()->back()->with('admineroor', 'something went wrong');
        }
    }
     // ajax function
     public function verifyOwnerID($id)
     {
          $verifyOwner = User::where('id',strtoupper($id))->exists();
          if($verifyOwner)
          {
            $ownerProperty = onBoardProperties::where('OwnerID',$id)->exists();
            if($ownerProperty)
            {
                $propertiesData = onBoardProperties::where('OwnerID',$id)->get();
                return response([
                    "data"=>$propertiesData,
                    "msg"=>"<span style='color:green;'>Valid Owner ID</span>"
                ],200);
            }else
            {
                return response([
                    "msg"=>"<span style='color:red;' id='inValid'> This owner does not have any property </span>"
                ],200);
            }
          }else
          {
            return response([
                "msg"=>"<span style='color:red;' id='invalid'> inValid Owner ID </span>"
            ],200);
          }
     }
     public function vOwnerID($id)
     {
          $verifyOwner = User::where('id',strtoupper($id))->exists();
          if($verifyOwner)
          {
            $ownerProperty = onBoardProperties::where('OwnerID',$id)->exists();
            if($ownerProperty)
            {
                $propertiesData = onBoardProperties::where('OwnerID',$id)->get();
                         echo "<option>Select Property</option>";
                    foreach($propertiesData as $pdata)
                    {
                         echo "<option value=".$pdata->id.">".$pdata->propertyName."</option>";
                    }   
            }else
            {
                echo "<option value=''>NO Property Exists</option>";
            }
          }else
          {
            return response([
                "msg"=>"<span style='color:red;' id='invalid'> inValid Owner ID </span>"
            ],200);
          }
     }
     public function vvOwnerID($id)
     {
          $verifyOwner = User::where('id',strtoupper($id))->exists();
          if($verifyOwner)
          {
            $ownerProperty = onBoardProperties::where('OwnerID',$id)->exists();
            if($ownerProperty)
            {
                $propertiesData = onBoardProperties::where('OwnerID',$id)->get();
                         echo "<option>Select Property</option>";
                    foreach($propertiesData as $pdata)
                    {
                         echo "<option value=".$pdata->propUniqueID.">".$pdata->propertyName."</option>";
                    }   
            }else
            {
                echo "<option value=''>NO Property Exists</option>";
            }
          }else
          {
            return response([
                "msg"=>"<span style='color:red;' id='invalid'> inValid Owner ID </span>"
            ],200);
          }
     }
     public function ajUnitID($id)
     {
        
            $propertiesData = rentPropertyUnit::where('propertyID',$id)->get();
            if(count($propertiesData)>0){
                foreach($propertiesData as $pdata)
                {
                        echo "<option value=".$pdata->id.">".$pdata->unit_name."</option>";
                }   
            }else
            {
                echo "<option value=''>NO Unit Exists</option>";
            }
     }
     public function pajUnitID($id)
     {
        
            $propertiesData = rentPropertyUnit::where('propertyID',$id)->get();
            if(count($propertiesData)>0){
                foreach($propertiesData as $pdata)
                {
                        // echo "<input value=".$pdata->id.">".$pdata->unit_name."</input>";

                        echo '<div class="">
                        <input type="checkbox" value='.$pdata->id.' id="unt'.$pdata->id.'" name="units[]" class="unitsticket">
                        <label id="unt'.$pdata->id.'" for="unt'.$pdata->id.'" class="d-block">'.$pdata->unit_name.'</label>
                    </div>';
                }   
            }else
            {
                echo "<option value=''>NO Unit Exists</option>";
            }
     }
     public function subPajUnitID($id)
     {
        
        $propertiesData = subUnits::where('unitID',$id)->get();
            if(count($propertiesData)>0){
                return response([
                    'subUnits'=>$propertiesData
                ]);
                // foreach($propertiesData as $pdata)
                // {
                //     echo '<div class="">
                //             <input type="checkbox" value='.$pdata->id.' id="unt'.$pdata->id.'" name="subunits[]" class="unitsticket">
                //             <label id="unt'.$pdata->id.'" for="unt'.$pdata->id.'" class="d-block">'.$pdata->unit_name.'</label>
                //         </div>';
                // }   
            }else
            {
                return response([
                    'subUnits'=>'no'
                ]);
            }
     }
     // filter ticket
     public function ticketPriority(request $request)
     {
          try
          {
             if(Auth::user()->role_as == 4 || Auth::user()->role_as == 10) 
             {
                 $ticketDetails = ticketModel::where(['Priority'=> $request->filterkey,'assigned'=> 0])->paginate(10);
                 $propertyDetails = onBoardProperties::get();
 
             }elseif(Auth::user()->role_as == 5)
             {
                 $ticketDetails = ticketModel::where(['customberID'=>Auth::Id(),'Priority' => $request->filterkey,'assigned'=> 0])->paginate(10);
                 $propertyDetails = onBoardProperties::where('OwnerID',Auth::Id())->get();
             }
             $ticketpropcity =  ticketModel::where(['assigned'=> 0])->with('propertyDetails','customberDetails','superVisorDetails')->pluck('propertyID')->toArray();
             $propertycity = onBoardProperties::whereIn('id',$ticketpropcity)->pluck('city')->toArray();
             $superVisorNear = User::whereIn('city',$propertycity)->where('role_as',7)->get();
             $departments = departments::get();
             $expensesProperties = expensesModel::select('propertyID')->with('Owner','propertyName')->get();
             $services = services::get();
             return view('backend.ticket.raiseTicket')->with(compact('ticketDetails','propertyDetails','expensesProperties','services','departments','superVisorNear'));
          }catch(Exception $e)
          {
             return redirect()->back()->with('adminerror',$e->getmessage());
          }
     }
     public function assignedTickets(request $request)
     {
        try
          {
             if(Auth::user()->role_as == 4 || Auth::user()->role_as == 10) 
             {
                 $ticketDetails = ticketModel::where(['Priority'=> $request->filterkey])->orWHERE(['assigned'=>1])->paginate(10);
                 $propertyDetails = onBoardProperties::get();
             }
             $ticketpropcity =  ticketModel::where(['assigned'=> 1])->with('propertyDetails','customberDetails','superVisorDetails')->pluck('propertyID')->toArray();
             $propertycity = onBoardProperties::whereIn('id',$ticketpropcity)->pluck('city')->toArray();
             $superVisorNear = User::whereIn('city',$propertycity)->where('role_as',7)->get();
             $departments = departments::get();
             $expensesProperties = expensesModel::select('propertyID')->with('Owner','propertyName')->get();
             $services = services::get();
             return view('backend.ticket.raiseTicket')->with(compact('ticketDetails','propertyDetails','expensesProperties','services','departments','superVisorNear'));
          }catch(Exception $e)
          {
             return redirect()->back()->with('adminerror',$e->getmessage());
          }
     }
     //public function assign ticket function 
     public function assignTicket(request $request)
     {
        try
        {
           $validate = $request->validate([
              'priority'=>'required',
              'id'=>'required',
              'supervisorID'=>'required',
              'assigned'=>'required'
           ]);
           if($validate)
           {
            //   dd($validate);
              $data = [
                'Priority'=>$request->priority,
                'AssignTo'=>$request->supervisorID,
                'assigned'=>1
              ];
              ticketModel::where('id',$request->id)->update($data);
              return redirect()->back()->with('adminsuccess','Ticket Assign Successfully');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','somethingw ent wrong');
        }
     }

}
