<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\QuoteForm;
use App\Models\HomeAbout;
use App\Models\CommercialProject;

class HomeController extends Controller
{
    public function index()
    {
        $setting = Setting::latest()->first();
        $quote = QuoteForm::latest()->first();
        $homeAbout = HomeAbout::latest()->first();
        $commercialProject = CommercialProject::latest()->first(); // fetch latest commercial project

        return view('home', compact('setting', 'quote', 'homeAbout', 'commercialProject'));
    }

}
