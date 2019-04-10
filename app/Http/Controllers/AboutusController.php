<?php

namespace App\Http\Controllers;

use App\Models\Ourteam;
use App\Models\Certificate;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
    	$memmbers=Ourteam::all();
    	$certificates = Certificate::all();
        return view('layouts.pages.about', compact(['memmbers','certificates']));
    }
}
