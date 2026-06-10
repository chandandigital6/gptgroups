<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }


    public function about()
    {
        return view('front.about');
    }


      public function brands()
    {
        return view('front.brands');
    }



    public function groups_company()
    {
        return view('front.groups_company');
    }



    public function network()
    {
        return view('front.network');
    }



    public function news()
    {
        return view('front.news');
    }


    public function retail_outlet()
    {
        return view('front.retail_outlet');
    }


    public function products()
    {
        return view('front.products');
    }

    public function carriers()
    {
        return view('front.carriers');
    }

    public function contact()
    {
        return view('front.contact');
    }


}
