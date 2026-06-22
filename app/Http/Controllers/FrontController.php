<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\FounderSection;
use App\Models\TeamMemberGpt;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        $banners = Banner::where('status', 1)
            ->orderBy('sort_order', 'asc')
            ->latest()
            ->get();

                $founderSection = FounderSection::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->first();

        return view('front.index', compact('banners','founderSection'));
    }


    public function about()
    {
            $founderSection = FounderSection::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->first();

         $teamMembers = TeamMemberGpt::where('status', 1)
        ->orderBy('sort_order', 'asc')
        ->latest()
        ->get();
        return view('front.about',compact('founderSection','teamMembers'));
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

    public function services()
    {
        return view('front.services');
    }
}
