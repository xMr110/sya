<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Initiative;
use App\Models\Joinus;
use App\Models\Ourteam;
use App\Models\Partner;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index()
    {
        $memmbers=Ourteam::all();
        $company = Joinus::where('slug','Company')->first();
        $person = Joinus::where('slug','Person')->first();
        $partners = Partner::all();
        $programs = Program::all()->where('featured','1');
        $initiatives = Initiative::all()->where('featured','1');
        return view('index',compact(['memmbers','person','company','partners','programs','initiatives']));
    }

    public function programs()
    {
        $programs = Program::all();
        return view('layouts.programs.index',compact('programs'));
    }
    public function program($id)
    {
        $program = Program::findOrFail($id);
        return view('layouts.programs.show',compact('program'));
    }

    public function support()
    {
        return view('layouts.pages.joinusCompany');
    }
    public function person()
    {
        return view('layouts.pages.joinusPerson');

    }
    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        Mail::to([
            'email' => 'info@syrian-youth.org'
        ])->send(new ContactMail($request->all()));

        return back()->with('success', 'تم إرسال الرسالة بنجاح...');
    }
}
