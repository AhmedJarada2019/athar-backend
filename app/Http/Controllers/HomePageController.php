<?php

namespace App\Http\Controllers;

use App\Http\Resources\AboutAtharResource;
use App\Http\Resources\ContactUsResource;
use App\Http\Resources\HeroSectionResource;
use App\Http\Resources\HowItWorkResource;
use App\Http\Resources\MainStatisticResource;
use App\Http\Resources\PolicyAndTermResource;
use App\Http\Resources\SocialMediaResource;
use App\Http\Resources\WhyAtharResource;
use App\Models\AboutAthar;
use App\Models\ContactUs;
use App\Models\HeroSection;
use App\Models\HowItWork;
use App\Models\MainStatistic;
use App\Models\PolicyAndTerm;
use App\Models\SocialMedia;
use App\Models\WhyAthar;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function show()
    {
        return [
            "hero_section" => new HeroSectionResource(HeroSection::first()),
            "why_athar"    => new WhyAtharResource(WhyAthar::with('whyAtharItems')->first()),
            "statistics"   => MainStatisticResource::collection(MainStatistic::orderBy('sort_order')->get()),
            "about_athar"  => new AboutAtharResource(AboutAthar::first()),
            "how_it_work"    => new HowItWorkResource(HowItWork::with(['howItWorkItems' => function ($query) {
                $query->orderBy('sort_order');
            }])->first())
        ];
    }
    public function footer()
    {
        return new ContactUsResource(ContactUs::first());
    }
    public function socialMedia()
    {
        return SocialMediaResource::collection(SocialMedia::get());
    }
    public function policies()
    {
        return new PolicyAndTermResource(PolicyAndTerm::where('type', 'policy')->first());
    }
    public function terms()
    {
        return new PolicyAndTermResource(PolicyAndTerm::where('type', 'term')->first());
    }
}
