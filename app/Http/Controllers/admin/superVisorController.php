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
use App\Events\propertyMail;
use Event;
use Auth;
use View;
use App\Models\permissions;
use App\Models\ticketModel;
use App\Models\services;
use App\Models\departments;
class superVisorController extends Controller
{
    public function assignedTicket()
    {
        try
        {
           $assignTickets = ticketModel::with('propertyDetails','customberDetails','superVisorDetails')->where('AssignTo',Auth::Id())->paginate();
           return view('backend.supervisor.assigntickets')->with(compact('assignTickets'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    //accept ticket
    public function acceptTicket(request $request)
    {
        try
        {
            // dd($request->all());
           $validate = $request->validate([
              'workstatus'=>'required',
              'id'=>'required'
           ]);
           if($validate)
           {
               $data = [
                    'status'=>$request->workstatus,
                    'Notes_Comments'=>$request->notes,
               ];
              $helpdeskDetails = User::where('role_as',4)->pluck('email')->toArray();
              $customberDetails = User::where('id',Auth::id())->first();
              if($request->workstatus == 4)
              {
                $helpdeskMail = [
                    'Name'=>$customberDetails->name,
                    'title'=>'superVisor',
                    'Email'=>'kamalsainiofficals@gmail.com',
                    'ccEmail'=> $helpdeskDetails,
                    'subject'=>'Ticket Accept',
                    'TicketNo'=>'',
                    'messagess'=>'',
                    'Message'=>'superVisor '.$customberDetails->name.' Not Accept Ticket',
                  ];
              }else
              {
                $customberMail = [
                    'Name'=>$customberDetails->name,
                    'title'=>'superVisor',
                    'Email'=>$customberDetails->email,
                    'ccEmail'=>$helpdeskDetails,
                    'subject'=>'Accept',
                    'TicketNo'=>'',
                    'messagess'=>'',
                    'Message'=>'Notify Accept Ticket',
                  ];
                $helpdeskMail = [
                    'Name'=>$customberDetails->name,
                    'title'=>'Accept By',
                    'Email'=>'kamalsainiofficals@gmail.com',
                    'ccEmail'=> $helpdeskDetails,
                    'subject'=>'Ticket Accept',
                    'TicketNo'=>'',
                    'messagess'=>'',
                    'Message'=>'Supervisor Successfully Accept Ticket',
                  ];
                  Event::dispatch(new propertyMail($customberMail));
              }
              
              Event::dispatch(new propertyMail($helpdeskMail));
              ticketModel::where('id',$request->id)->update($data);
               return redirect()->back()->with('adminsuccess','ticket status updated');
           }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
}
