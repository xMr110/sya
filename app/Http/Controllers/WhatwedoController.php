<?php

namespace App\Http\Controllers;

use App\Models\Whatwedo;
use Illuminate\Http\Request;

class WhatwedoController extends Controller
{
    public function index()
    {
    	return view('layouts.pages.whatwedo');
        // $projects = Whatwedo::orderBy('Date','DESC')->get();
        // return view('layouts.pages.whatwedo',compact('projects'));
    }
}
