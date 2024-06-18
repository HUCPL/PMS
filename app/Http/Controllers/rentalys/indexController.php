<?php

namespace App\Http\Controllers\rentalys;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        return view('rentalys.pages.homepage');
    }
    public function aboutUS()
    {
        return view('rentalys.pages.about');
    }
    public function agents()
    {
        return view('rentalys.pages.agents');
    }
    public function Blog()
    {
        return view('rentalys.pages.blog');     
    }
    public function Contact()
    {
        return view('rentalys.pages.contact');   
    }
    public function Compare()
    {
        return view('rentalys.pages.compare'); 
    }
    public function wishList()
    {
        return view('rentalys.pages.wishlist'); 
    }
    public function loginPage()
    {
        return view('rentalys.pages.login'); 
    }
}
