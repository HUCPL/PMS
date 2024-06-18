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
use View;
use App\Models\permissions;
use App\Models\packageServices;
use App\Models\package;
use App\Models\extraservices;
use App\Models\services;
class siteEngineer extends Controller
{

    public function siteEngineer()
    {
        return view('backend.pages.siteEngineer.demo');
    }
    //onBoardList
    public function seOnBoardList()
    {
        try
        {
            $onBoardProperties = onBoardProperties::with('masterCategory','packages')->where(['city'=>Auth::user()->city])->paginate(10);
            $packages= package::where('isDeleted',0)->get();
            // $services = packageServices::where('isDeleted',0)->get();
            $services = services::where('parent_id','=',0)->get();
            $subServices = services::where('parent_id','!=',0)->get();
            // $onBoardProperties = onBoardProperties::with('masterCategory','ownerDetails')->paginate(10);
            return view('backend.onBoard.onBoardList')->with(compact('onBoardProperties','packages','services','subServices')); 
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    //Approved or Not Approved function
    public function updateStatus(request $request)
    {
          try
          {
            //   dd($request->all());
             if(Auth::user()->role_as == 10 || Auth::user()->role_as == 4)
             {
                 $requiredFields['approved'] = 'required';
             }
             $requiredFields['remarks'] = 'required';
             $requiredFields['aggstart'] = 'required';
             $requiredFields['aggend'] = 'required';
             $validate = $request->validate($requiredFields);
             if($validate)
             {
                // dd($request->all());
                if(Auth::user()->role_as == 10 || Auth::user()->role_as == 4)
                {
                    $data['isApproved'] = $request->approved;
                }
                $data['remarks'] = $request->remarks;
                $data['aggrement_start_date'] = $request->aggrement_start_date;
                $data['aggrement_end_date'] = $request->aggrement_end_date;
                $data['packagesID'] = $request->packages;
                $ownerData = User::where(['role_as'=>5,'id'=>$request->ownerId])->first();
                $properDetails= onBoardProperties::select('email')->where('id',$request->id)->first();
                if($request->approved == 0)
                {
                    
                    $eventData =[
                         'Name'=>$ownerData->name,
                         'Email'=>$ownerData->email,
                         'title'=>'hi',
                         'TicketNo'=>'',
                         'messagess'=>'',
                         'ccEmail'=>$properDetails->email,
                         'Message'=>'Hurray your Property is Approved by Our Site Engineer.
                         Thank you for choosing our platform to list your property. We appreciate your trust in our services. If you have any questions or need further assistance during this process, please do not hesitate to reach out to our support team at info@pms.com.',
                    ];
                }elseif($request->approved == 1)
                {
                    $eventData =[
                        'Name'=>$ownerData->name,
                        'Email'=>$ownerData->email,
                        'title'=>'hi',
                        'TicketNo'=>'',
                        'messagess'=>'',
                        'ccEmail'=>$properDetails->email,
                        'Message'=>'your Property is have some issues  so its on under review to approve it take some time.
                        Thank you for choosing our platform to list your property. We appreciate your trust in our services. If you have any questions or need further assistance during this process, please do not hesitate to reach out to our support team at info@pms.com .',
                   ];
                }else
                {
                    $eventData =[
                        'Name'=>$ownerData->name,
                        'Email'=>$ownerData->email,
                        'title'=>'hi',
                        'TicketNo'=>'',
                        'messagess'=>'',
                        'ccEmail'=>$properDetails->email,
                        'Message'=>'!sorry you property Not Approved by our site Engineer.
                        Thank you for choosing our platform to list your property. We appreciate your trust in our services. If you have any questions or need further assistance during this process, please do not hesitate to reach out to our support team at info@pms.com .',
                   ];
                }
                // if(!empty($request->propid) || !empty($request->subservcies))
                // {
                //         $serv = $request->servcies;
                //         $subserv = $request->subservcies;
                //         $datas['serviceID'] = implode(',',$serv);
                //         $datas['propertyID'] = $request->propid;
                //         $datas['isDeleted'] = 0;
                //         if(!empty($request->subservcies)){
                //           $datas['subServicesID'] = implode(',',$subserv);
                //         }
                //         // $datas = [
                //         //   'serviceID' => implode(',',$serv),
                //         //   'propertyID'=> $request->propid,
                //         //   'subServicesID' => implode(',',$subserv),
                //         //   'isDeleted' => 0,
                //         // ];
                //         extraservices::create($datas);
                // } 
                if(Auth::user()->role_as == 10 && Auth::user()->role_as == 4)
                {
                    Event::dispatch(new propertyMail($eventData));
                }
                if($request->hasfile('inspImages'))
                {
                   $images = $request->file('inspImages');
                   foreach ($images as $image) {
                     $imageExtension = $image->getClientOriginalExtension();
                     $imageName = bin2hex(random_bytes(2)).'.'.$imageExtension;
                     \Storage::putFileAs('public/uploads/inspectionimages',$image,$imageName);
                     $imageNameArray[] = $imageName;
                     $imageURlArray[] = \Storage::url('uploads/inspectionimages').'/'.$imageName;
                   }
                   $data['insp_file_name'] = implode(',',$imageNameArray);
                   $data['insp_file_path'] = implode(',',$imageURlArray);
                }
                 
                onBoardProperties::where('id',$request->id)->update($data);
               
                return redirect()->back()->with('adminsuccess','Details Send Successfully for Inspection');
             }
          }catch(Excetipn $e)
          {
            return redirect()->back()->with('adminerror','something went wrong');
          }
    }
}
