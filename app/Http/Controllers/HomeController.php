<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class HomeController extends Controller
{

    public function index()
    {
        $setting = Setting::first(); // fetch first row from settings table
        return view('home', compact('setting'));
    }

}
