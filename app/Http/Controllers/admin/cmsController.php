<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Auth;
use App\Models\generalSetting;
use Storage;
class cmsController extends Controller
{
    public function generalSetting()
    {
        try
        {
            $generalData = generalSetting::latest()->first();
           return view('backend.cms.general.add',compact('generalData'));
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function saveSetting(request $request)
    {
        try
        { 
            if($request->hasfile('adminlogo'))
            {
                $logo = $request->file('adminlogo');
                $logoName = bin2hex(random_bytes(4)).'.'.$logo->getClientOriginalExtension();
                \Storage::putFileAs('public/uploads/settingsImages',$logo,$logoName);
                $logoUrl = \Storage::url('uploads/settingsImages').'/'.$logoName;
                $data['adminlogo_name'] = $logoName;
                $data['adminlogo_path'] = $logoUrl;
            }
            if($request->hasfile('favicon'))
            {
                $fav = $request->file('favicon');
                $favicon = bin2hex(random_bytes(4)).'.'.getClientOriginalExtension();
                \Storage::putFileAs('public/uploads/settingsImages',$fav,$favicon);
                $favUrl = \Storage::url('uploads/settingsImages').'/'.$favicon;
                $data['favicon_name'] = $favicon;
                $data['favicon_path'] = $favUrl;
            }
            $data['meta_tags']=  $request->metatags;
            $data['meta_description']=$request->metadescription;
            generalSetting::create($data);
            return redirect()->back()->with('adminsuccess','Setting Saved Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
    public function updateSetting(request $request)
    {
        try
        { 
            if($request->hasfile('adminlogo'))
            {
                $logo = $request->file('adminlogo');
                $logoName = bin2hex(random_bytes(4)).'.'.$logo->getClientOriginalExtension();
                \Storage::putFileAs('public/uploads/settingsImages',$logo,$logoName);
                $logoUrl = \Storage::url('uploads/settingsImages').'/'.$logoName;
                $data['adminlogo_name'] = $logoName;
                $data['adminlogo_path'] = $logoUrl;
            }
            if($request->hasfile('favicon'))
            {
                $fav = $request->file('favicon');
                $favicon = bin2hex(random_bytes(4)).'.'.$fav->getClientOriginalExtension();
                \Storage::putFileAs('public/uploads/settingsImages',$fav,$favicon);
                $favUrl = \Storage::url('uploads/settingsImages').'/'.$favicon;
                $data['favicon_name'] = $favicon;
                $data['favicon_path'] = $favUrl;
            }
            $data['meta_tags']=  $request->metatags;
            $data['meta_description']=$request->metadescription;
            // die;
            generalSetting::where('id',$request->id)->update($data);
            return redirect()->back()->with('adminsuccess','Setting updated Successfully');
        }catch(Exception $e)
        {
            return redirect()->back()->with('adminerror',$e->getmessage());
        }
    }
}
