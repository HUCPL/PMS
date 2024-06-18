<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\assignSPD;
use App\Models\ticketModel;
use Exception;
use Storage;
use View;
use App\Models\onBoardProperties;
use App\Models\expensesModel;
use App\Models\permissions;
use Auth;
class usersController extends Controller
{

    public function usersMangement()
    {
        $userDetails = User::where('role_As','!=',10)->where('role_As','!=',5)->paginate(10);
        return view('backend.pages.users')->with(compact('userDetails'));
    }
    public function ownerList()
    {
        try
        {
            $userDetails = User::where('role_As',5)->paginate(10);
            $key = 'Owner';
            return view('backend.pages.users')->with(compact('userDetails','key'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function helpDeskList()
    {
        try
        {
            $userDetails = User::where('role_As',4)->paginate(10);
            $key = 'HelpDesk';
            return view('backend.pages.users')->with(compact('userDetails','key'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function siteEngineerList()
    {
        try
        {
            $userDetails = User::where('role_As',2)->paginate(10);
            $key = 'SiteEngineer';
            return view('backend.pages.users')->with(compact('userDetails','key'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function superVisorList()
    {
        try
        {
            $userDetails = User::where('role_As',7)->paginate(10);
            $key = 'SuperVisor';
            return view('backend.pages.users')->with(compact('userDetails','key'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function vendorList()
    {
        try
        {
            $userDetails = User::where('role_As',3)->paginate(10);
            $key = 'Vendor';
            return view('backend.pages.users')->with(compact('userDetails','key'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror','something went wrong');
        }
    }
    public function addUser(request $request)
    {
        try
        {
            // dd($request->all());
            $validate = $request->validate([
                'fullname'=>'required',
                'email'=>'required|email',
                'phoneNumber'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                'address'=>'required',
                'country'=>'required',
                'state'=>'required',
                'city'=>'required',
                'zipCode'=>'required',
                'role'=>'required',
                'password'=>'required'
            ],['email.required' => 'email must be valid']);
            if($validate)
            {
                $emailExist =  User::where('email',$request->email)->whereNull('deleted_at')->exists();
                $phoneExist =  User::where('number',$request->phoneNumber)->whereNull('deleted_at')->exists();
                if($emailExist)
                {
                    return redirect()->back()->with('adminerror','Email Already exist');
                }elseif($phoneExist)
                {
                    return redirect()->back()->with('adminerror','Phone Already exist');
                }else
                {
                    if($request->hasfile('profileimage'))
                    {
                        $image = $request->file('profileimage');
                        $imageName =bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                        \Storage::putFileAs('public/uploads',$image,$imageName);
                        $url = \Storage::url('uploads').'/'.$imageName;                    
                    }else
                    {
                        $imageName = "No Image";
                        $url = "No Url";   
                    }
                   if($request->hasfile('certificateAttachment'))
                   {
                        $attachimage = $request->file('certificateAttachment');
                        $attachimageName = bin2hex(random_bytes(4)).'.'.$attachimage->getClientOriginalExtension();
                        \Storage::putFileAs('public/uploads',$attachimage,$attachimageName);
                        $attachurl = \Storage::url('uploads').'/'.$attachimageName;
                   }else
                   {
                       $attachurl = " ";
                   }
                   $data = [
                        'name' => $request->fullname,
                        'email'=>$request->email,
                        'number'=>$request->phoneNumber,
                        'address'=>$request->address,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'zipcode'=>$request->zipCode,
                        'role_as'=>$request->role,
                        'password'=>\bcrypt($request->password),
                        // 'Owner_id'=>"Owner_ID_".strtoupper(bin2hex(random_bytes(2))),
                        // 'employe_id'=>"EMPID".strtoupper(bin2hex(random_bytes(2))),
                        'Experience'=>$request->experience,
                        'skills_services'=>$request->skills,
                        'certificate'=>$request->certificate,
                        'certificate_attachment'=>$attachurl,
                        'image_name'=>$imageName,
                        'image_path'=>$url
                   ];
                   if($request->role == 5)
                   {
                      $data['Owner_id']= "OWNERID".strtoupper(bin2hex(random_bytes(2)));
                   }else
                   {
                      $data['employe_id'] = "EMPID".strtoupper(bin2hex(random_bytes(2)));
                   }
                   User::create($data);
                   if(isset($request->registerlink))
                   {
                       return redirect()->route('vendorLogin')->with('adminsuccess','User Added successfully. Please Login To your Account');
                   }else
                   {
                       return redirect()->back()->with('adminsuccess','User Added successfully');
                   }
                }
              
            }
        }catch(Exception $e)
        {
            $errorCode = $e->errorInfo[1];
            if($errorCode == 1062){
                return redirect()->back()->with("adminerror",'Email already exist'); 
            }else
            {
                return redirect()->back()->with("adminerror",'Something went wrong');   
            }
        }
    }
    public function deleteUser($id)
    {
        try
        {
                echo $id;
                die;
             $delete = User::where('id',$id)->delete();
             $deletecus = ticketModel::where('customberID',$id);
             if($deletecus)
             {
                $deletecus = $deletecus->delete();
             }
             $deletesup = ticketModel::where('AssignTo',$id);
             if($deletesup)
             {
                $deletesup = $deletesup->delete();
             }
             $expensesDelete =  expensesModel::where('ownerID',$id);
             if($expensesDelete)
             {
                $expensesDelete = $expensesDelete->delete();
             }
             echo $id;
             die;
             $propDelete =  onBoardProperties::where('OwnerID',$id);
             if($propDelete)
             {
                $propDelete = $propDelete->delete();
                echo "its working.....";
                die;
             }
            //  $onBoardProperties = onBoardProperties::where('OwnerID',$id)->delete();
             return redirect()->back()->with('adminsuccess','user delete Successfully');
        }catch(Exception $e)
        {
            
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function updateUser(request $request)
    {
        try
        {
            
            $validate = $request->validate([
                'fullname'=>'required',
                'email'=>'required|email',
                'phoneNumber'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
                'address'=>'required',
                'country'=>'required',
                'state'=>'required',
                'city'=>'required',
                'zipCode'=>'required',
                'role'=>'required',
            ],['email.required' => 'email must be valid']);
            if($validate)
            {
                
                if($request->hasfile('profileimage'))
                {
                    $image = $request->file('profileimage');
                    $imageName = bin2hex(random_bytes(4)).'.'.$image->getClientOriginalExtension();
                    \Storage::putFileAs('public/uploads',$image,$imageName);
                    $url = \Storage::url('uploads').'/'.$imageName;
                    $data = [
                        'name' => $request->fullname,
                        'email'=>$request->email,
                        'number'=>$request->phoneNumber,
                        'address'=>$request->address,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'zipcode'=>$request->zipCode,
                        'role_as'=>$request->role,
                        'image_name'=>$imageName,
                        'image_path'=>$url
                    ]; 
                    if($request->hasfile('certificateAttachment'))
                    {
                        $attachimage = $request->file('certificateAttachment');
                        $attachimageName = bin2hex(random_bytes(4)).'.'.$attachimage->getClientOriginalExtension();
                        \Storage::putFileAs('public/uploads',$attachimage,$attachimageName);
                        $attachurl = \Storage::url('uploads').'/'.$attachimageName;
                        $data['certificate_attachment'] = $attachurl;
                        
                    }
                    $data = [
                        'name' => $request->fullname,
                        'email'=>$request->email,
                        'number'=>$request->phoneNumber,
                        'address'=>$request->address,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'zipcode'=>$request->zipCode,
                        'role_as'=>$request->role,
                        // 'Owner_id'=>"Owner_ID_".strtoupper(bin2hex(random_bytes(2))),
                        // 'employe_id'=>"EMPID".strtoupper(bin2hex(random_bytes(2))),
                        'Experience'=>$request->experience,
                        'skills_services'=>$request->skills,
                        'certificate'=>$request->certificate,
                        // 'certificate_attachment'=>$attachurl,
                        'image_name'=> $imageName,
                        'image_path'=>$url
                    ];                    
                }else
                {
                    $data = [
                        'name' => $request->fullname,
                        'email'=>$request->email,
                        'number'=>$request->phoneNumber,
                        'address'=>$request->address,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'zipcode'=>$request->zipCode,
                        'role_as'=>$request->role, 
                    ];
                    if($request->hasfile('certificateAttachment'))
                    {
                        $attachimage = $request->file('certificateAttachment');
                        $attachimageName = bin2hex(random_bytes(4)).'.'.$attachimage->getClientOriginalExtension();
                        \Storage::putFileAs('public/uploads',$attachimage,$attachimageName);
                        $attachurl = \Storage::url('uploads').'/'.$attachimageName;
                        $data['certificate_attachment'] = $attachurl;
                        $data['image_name']= $imageName;
                    }
                    $data = [
                        'name' => $request->fullname,
                        'email'=>$request->email,
                        'number'=>$request->phoneNumber,
                        'address'=>$request->address,
                        'country'=>$request->country,
                        'state'=>$request->state,
                        'city'=>$request->city,
                        'zipcode'=>$request->zipCode,
                        'role_as'=>$request->role,
                        // 'Owner_id'=>"Owner_ID_".strtoupper(bin2hex(random_bytes(2))),
                        // 'employe_id'=>"EMPID".strtoupper(bin2hex(random_bytes(2))),
                        'Experience'=>$request->experience,
                        'skills_services'=>$request->skills,
                        'certificate'=>$request->certificate,
                    ]; 
                }
               
            User::where('id',$request->id)->update($data);
            return redirect()->back()->with('adminsuccess','User updated successfully'); 
            }
        }catch(Exception $e)
        {
           return redirect()->back()->with("adminerror",$e->getmessage());
        }
    }
    //users Trash 
    public function usersTrash()
    {
        $userDetails = User::where('role_As','!=',10)->onlyTrashed()->paginate(10);
        return view('backend.recycleBin.usersTrash')->with(compact('userDetails'));
    }
    public function usersTrashRestore($id)
    {
        try
        {
             $delete = User::where('id',$id)->restore();
             $deletecus = ticketModel::where('customberID',$id);
             if($deletecus)
             {
                $deletecus = $deletecus->restore();
             }
             $deletesup = ticketModel::where('AssignTo',$id);
             if($deletesup)
             {
                $deletesup = $deletesup->restore();
             }
             $expensesDelete =  expensesModel::where('ownerID',$id);
             if($expensesDelete)
             {
                $expensesDelete = $expensesDelete->restore();
             }
             $propDelete =  onBoardProperties::where('ownerID',$id);
             if($propDelete)
             {
                $propDelete = $propDelete->restore();
             }
            //  $onBoardProperties = onBoardProperties::where('OwnerID',$id)->delete();
             return redirect()->back()->with('adminsuccess','user restore Successfully');
        }catch(Exception $e)
        {
            
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function usersForceDelete($id)
    {
        try
        {
             $delete = User::where('id',$id)->forceDelete();
             $deletecus = ticketModel::where('customberID',$id);
             if($deletecus)
             {
                $deletecus = $deletecus->forceDelete();
             }
             $deletesup = ticketModel::where('AssignTo',$id);
             if($deletesup)
             {
                $deletesup = $deletesup->forceDelete();
             }
             $expensesDelete =  expensesModel::where('ownerID',$id);
             if($expensesDelete)
             {
                $expensesDelete = $expensesDelete->forceDelete();
             }
             $propDelete =  onBoardProperties::where('ownerID',$id);
             if($propDelete)
             {
                $propDelete = $propDelete->forceDelete();
             }
            //  $onBoardProperties = onBoardProperties::where('OwnerID',$id)->delete();
             return redirect()->back()->with('adminsuccess','User Permanent Delete Successfully');
        }catch(Exception $e)
        {
            
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
}
