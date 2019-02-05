<?php

namespace App\Http\Controllers;

use App\Http\Requests\GpostRequest;
use App\Models\Gpost;
use Illuminate\Http\Request;

class GuestblogController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth', ['except' => ['store','index','write','show']]);
    }
    public function index()
    {
        $gposts= Gpost::all()->where('status', '1');
        return view('layouts.guest.index',compact('gposts'));
    }
    public function write()
    {
        return view('layouts.guest.write');
    }
    public function store(GpostRequest $request)
    {
        $gpost = new Gpost();
        if($request->hasFile('image_path'))
        {
            $gpost->image_path=$request->file('image_path')->store('GuestsBlog','public');
        }
        $gpost->name = $request->get('name');
        $gpost->email = $request->get('email');
        $gpost->title = $request->get('title');
        $gpost->body = $request->get('body');
        $gpost->save();
        return redirect(action('GuestblogController@index'))->with('success','تم إرسال التدوينة النجاح بإنتظار الموافقة..');

//


    }

    public function show($id)
    {
        $gpost = Gpost::findOrFail($id);
        $populars = Gpost::orderBy('created_at', 'desc')->get()->take(4);
        return view('layouts.guest.show',compact(['gpost','populars']));
    }
}
