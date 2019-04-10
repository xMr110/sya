<?php

namespace App\Http\Controllers;

use App\Models\Ourteam;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
    	$memmbers=Ourteam::all();
        return view('layouts.pages.about', compact(['memmbers']));
    }
}
