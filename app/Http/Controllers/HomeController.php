<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\QuoteForm;

class HomeController extends Controller
{
    public function index()
    {
        // Get the latest setting
        $setting = Setting::latest()->first();

        // Get the latest quote, or null if no data
        $quote = QuoteForm::orderBy('id', 'desc')->first();

        return view('home', compact('setting', 'quote'));
    }
}
