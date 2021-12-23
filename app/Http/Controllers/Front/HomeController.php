<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Model\Sliders;
use App\Http\Model\Categories;
use App\Http\Model\Pages;
use App\Http\Model\DynamicPage;
use App\Http\Model\ContactUs;



class HomeController extends Controller
{
    public function index()
    {
        $slide = Sliders::all();
        $aboutus = Pages::find(1);
        $job_offer = DynamicPage::find(1);   
        $contact = ContactUs::find(1);
        $search_categories = Categories::all();
        return view('front.pages.index',compact('slide','search_categories','aboutus','job_offer','contact'));
    }

    public function login()
    {
        $aboutus = Pages::find(1);
        $contact = ContactUs::find(1);
        return view('front.pages.login',compact('aboutus','contact'));
    }
    public function signUp()
    {
        $aboutus = Pages::find(1);
        $contact = ContactUs::find(1);
        return view('front.pages.signup',compact('aboutus','contact'));

    }
    public function footerAboutus()
    {
        $aboutus = Pages::find(1);
        $contact = ContactUs::find(1);

        return view('front.layouts.footer',compact('aboutus','contact'));
    }
    
}
