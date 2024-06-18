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
use App\Models\package;
use App\Models\packageServices;
use App\Models\permissions;
use App\Models\raiseTicket;
use App\Models\services;

class ownerController extends Controller
{
    
    public function ownerLogin()
    {
        return view('backend.layout.login');
    }
    public function propertyList()
    {
        try
        {
            $onBoardProperties = onBoardProperties::where('OwnerID',Auth::Id())->with('masterCategory','ownerDetails')->paginate(10);
            $packages= package::where('isDeleted',0)->get();
            $services = services::where('parent_id','=',0)->get();
            $subServices = services::where('parent_id','!=',0)->get();
            return view('backend.onBoard.onBoardList')->with(compact('onBoardProperties','packages','services','subServices')); 
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addproperty()
    {
        $categoriesDetails = categoryModel::get();
        $propertyOnBoard = onBoardProperties::with('masterCategory','ownerDetails')->paginate(10);
        $onwerDetails = User::where('role_as',5)->get();
        return view('backend.onBoard.onboardProperty')->with(compact('propertyOnBoard','categoriesDetails','onwerDetails'));
    }
    public function updateproperty($id)
    {
        try
        {
            $updateOnBaord = onBoardProperties::with('ownerDetails','masterCategory')->where(['id'=>$id,'OwnerID'=>Auth::Id()])->first(); 
            $packages= package::where('isDeleted',0)->get();
            if($updateOnBaord)
            {
                // $onwerDetails = User::where('role_as',5)->get();
                $categoriesDetails = categoryModel::get();
                return view('backend.onBoard.updateonBoard')->with(compact('updateOnBaord','categoriesDetails','packages'));
            }else
            {
                return redirect()->back()->with('adminerror','Not Found');
            }
        }catch(Exception $e)
        {
            return redirect()->back()->with("adminerror",$e->getmessage());
        }
    }
    //Expenses Functions
    public function expenses()
    {
        try
        {
             $expensesDetails = expensesModel::with('Owner','propertyName')->where('ownerID',Auth::Id())->paginate(10);
             $expensesType = expensesModel::select('expenses_type')->get();
             $propertyDetails = onBoardProperties::where(['OwnerID'=>Auth::Id(),'isApproved'=>0])->get();
             $expensesProperties = expensesModel::select('propertyID')->with('Owner','propertyName')->get();
             return view('backend.expenses.expenses')->with(compact('expensesDetails','propertyDetails','expensesType','expensesProperties'));

        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function filterExpenses(request $request)
    {
        try
        {
             $expensesDetails = expensesModel::with('Owner','propertyName')->where(['ownerID'=>Auth::Id(),'propertyID'=>$request->filterprop])->whereBetween('date', [$request->expFromDate, $request->exptoDate])->paginate(10);
             $expensesType = expensesModel::select('expenses_type')->get();
             $propertyDetails = onBoardProperties::where(['OwnerID'=>Auth::Id(),'isApproved'=>0])->get();
             $expensesProperties = expensesModel::select('propertyID')->with('Owner','propertyName')->get();
             return view('backend.expenses.expenses')->with(compact('expensesDetails','propertyDetails','expensesType','expensesProperties'));

        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addExpenses(request $request)
    {
        try
        {
             $validate = $request->validate([
                'propertyID'=>'required',
                'expensesType'=>'required',
                'expDate'=>'required',
                'amount'=>'required',
                'expDescription'=>'required',
                'fileAttachment'=>'required',
                'ownerID'=>'required'
             ]);
             if($validate)
             {
                
                if($request->hasfile('fileAttachment'))
                {
                    $image = $request->file('fileAttachment');
                    $fileName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('public/pdffiles',$image,$fileName);
                    $url = \Storage::url('pdffiles').'/'.$fileName;
                }else
                {
                    $fileName = '';
                    $url = ''; 
                }
                $data = [
                    'propertyID'=>$request->propertyID,
                    'ownerID'=>$request->ownerID,
                    'expenses_type'=>$request->expensesType,
                    'date'=>$request->expDate,
                    'amount'=>$request->amount,
                    'Expense_Description'=>$request->expDescription,
                    'file_name'=>$fileName,
                    'file_path'=>$url,
                ];
                expensesModel::create($data);
                return redirect()->back()->with('adminsuccess','Expenses Add Successfully');
             }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function updateExpenses(request $request)
    {
        try
        {
 
                if($request->hasfile('fileAttachment'))
                {
                    $image = $request->file('fileAttachment');
                    $fileName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('public/pdffiles',$image,$fileName);
                    $url = \Storage::url('pdffiles').'/'.$fileName;
                    $data['file_name'] = $fileName;
                    $data['file_path'] = $url;
                    $data = [
                        'propertyID'=>$request->propertyID,
                        'ownerID'=>$request->ownerID,
                        'expenses_type'=>$request->expensesType,
                        'date'=>$request->expDate,
                        'amount'=>$request->amount,
                        'Expense_Description'=>$request->expDescription,
                        'file_name' => $fileName,
                        'file_path' => $url,
                    ];
                }else
                {
                    $data = [
                        'propertyID'=>$request->propertyID,
                        'ownerID'=>$request->ownerID,
                        'expenses_type'=>$request->expensesType,
                        'date'=>$request->expDate,
                        'amount'=>$request->amount,
                        'Expense_Description'=>$request->expDescription,
                    ];
                }
                expensesModel::where('id',$request->id)->update($data);
                return redirect()->back()->with('adminsuccess','Expense Details updated Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function viewPdf($id)
    {
        try
        {
              $viewpdf =   expensesModel::with('Owner','propertyName')->select('file_path')->where(['ownerID'=>Auth::Id(),'id'=>$id])->first();
              return view('backend.expenses.fileview')->with(compact('viewpdf'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function deleteExpenses($id)
    {
        try
        {
             $delete = expensesModel::where('id',$id)->delete();
            
             return redirect()->back()->with('adminsuccess','Expense Delete Successfully');
        }catch(Exception $e)
        {
             return redirect()->back()->with('admineroor', 'something went wrong');
        }
    }
    //raise Ticket
    public function raiseTicket()
    {
        try
        {  
            if(Auth::user()->role_as == 4)
            {
                $ticketDetails = raiseTicket::paginate(10);
                $propertyDetails = onBoardProperties::get();
                
            }elseif(Auth::user()->role_as == 10)
            {
                $ticketDetails = raiseTicket::paginate(10);
                $propertyDetails = onBoardProperties::get();
            }elseif(Auth::user()->role_as == 5)
            {
                $ticketDetails = raiseTicket::where('cusID',Auth::Id())->paginate(10);
                $propertyDetails = onBoardProperties::where('OwnerID',Auth::Id())->get();
            }
            $expensesProperties = expensesModel::select('propertyID')->with('Owner','propertyName')->get();
            $services = services::get();
            return view('backend.ticket.raiseTicket')->with(compact('ticketDetails','propertyDetails','expensesProperties','services'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function addTicket(request $request)
    {
        try
        {
             $validate = $request->validate([
                'propertyID'=>'required',
                'servicesID'=>'required',
                'message'=>'required',
                'priority'=>'required'
             ]);
             if($validate)
             {
                 $tickerID = strtoupper(bin2hex(random_bytes(4)));
                 if($request->hasfile('fileAttachment'))
                 {
                    $image = $request->file('fileAttachment');
                    $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                    Storage::putFileAs('public/ticketsImages',$image,$imageName);
                    $url = \Storage::url('ticketsImages').'/'.$imageName;
                    $data = [
                        'ticketID' => $tickerID,
                        'proppertyID'=> $request->propertyID,
                        'servicesID'=> $request->servicesID,
                        'cusID'=>$request->ownerID,
                        'Message'=>$request->message,
                        'file_name'=> $imageName,
                        'file_path'=> $url,
                        'owner_id'=>$request->cusID,
                        'setPriority'=>$request->priority
                     ];

                 }else
                 {
                     $data = [
                        'ticketID' => $tickerID,
                        'proppertyID'=> $request->propertyID,
                        'servicesID'=> $request->servicesID,
                        'cusID'=>$request->ownerID,
                        'Message'=>$request->message,
                        'owner_id'=>$request->cusID,
                        'setPriority'=>$request->priority
                     ];
                 }
                 raiseTicket::create($data);
                 return redirect()->back()->with('adminsuccess','ticket raised Successfully');

             }
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //function for assign property to user for rent
    public function assignProperty()
    {
        try
        {
           
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }

}
