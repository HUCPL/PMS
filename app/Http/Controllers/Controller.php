<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\permissions;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\onBoardProperties;
use View;
use App\Models\generalSetting;
class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        // parent::__construct();
        $generaldata =generalSetting::first();
        // dd($generaldata);die;
        view()->share('generaldata',$generaldata);
    }
}
