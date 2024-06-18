<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
use Auth;
use View;
use App\Models\permissions;
use Illuminate\Support\Facades\URL;
class authController extends Controller
{
   
    public function loginPage()
    {
         $login = URL::secure(request()->url());
        //  echo $login;
        //  die;
         return view('backend.layout.login')->with(compact('login'));
    }
    public function login(request $request)
    {
         try
         {
            $validate = $request->validate([
                'email' => 'required|email',
                'password'=>'required|min:6'
            ],[
               'email.required'=>"email must be valid"
            ]);
            if($validate)
            {
              if(Auth::attempt(['email' => $request->email, 'password' => $request->password]) )
              {
                    
                   if(Auth::user()->role_as == 10 && $request->loginurl == url('superadmin/login'))
                   {
                     return redirect('superadmin/dashboard')->with('adminsuccess','successfully login');
                   }elseif(Auth::user()->role_as == 3 && $request->loginurl == url('/login'))
                   {
                     return redirect('vendor/dashboard')->with('adminsuccess','successfully login');
                   }elseif(Auth::user()->role_as == 2 && $request->loginurl == url('/login'))
                   {
                     return redirect('siteEngineer/dashboard')->with('adminsuccess','successfully login');
                   }elseif(Auth::user()->role_as == 4 && $request->loginurl == url('/login'))
                   {
                     return redirect('helpdesk/dashboard')->with('adminsuccess','successfully login');
                   }elseif(Auth::user()->role_as == 5 && $request->loginurl == url('/login'))
                   {
                     return redirect('owner/dashboard')->with('adminsuccess','successfully login');
                   }elseif(Auth::user()->role_as == 6 && $request->loginurl == url('/login'))
                   {
                     return redirect('housekeeper/dashboard')->with('adminsuccess','successfully login');
                   }elseif(Auth::user()->role_as == 7 && $request->loginurl == url('/login'))
                   {
                     return redirect('superVisor/dashboard')->with('adminsuccess','successfully login');
                   }else
                   {
                     Auth::logout();
                     return redirect()->back()->with('adminerror','you are not authorized');
                   }
              }else
              {     
                    Auth::logout();
                    return redirect()->back()->with('adminerror','invalid credentials');
              }
            }
         }catch(Exception $e)
         {
             return redirect()->back()->with('adminerror','something went wrong');
         }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('adminsuccess','logout successfully');
    }
    //register
    public function Register()
    {
       try
       {
          $register =  request()->url();
          return view('backend.layout.register')->with(compact('register'));
       }catch(Exception $e)
       {
         return redirect()->back()->with('adminerror','something went wrong');
       }
    }
    public function checkStatus()
    {
      echo $_SERVER["SERVER_NAME"];
    }
}
