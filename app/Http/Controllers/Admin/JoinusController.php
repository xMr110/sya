<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\JoinusRequest;
use App\Models\Joinus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JoinusController extends Controller
{
    public function index()
    {
        $company = Joinus::where('slug','Company')->first();
        $person = Joinus::where('slug','Person')->first();
        return view('admin.joinus.index',compact(['company','person']));
    }
    public function edit($id)
    {
        $joinus = Joinus::findOrFail($id);
        return view('admin.joinus.edit',compact('joinus'));
    }
//    public function store(JoinusRequest $request)
//    {
//        $Joinus = new Joinus();
//
//        $Joinus->link = $request->link;
//
//        //filling translations
//        foreach (\Localization::getSupportedLocales() as $key => $value)
//        {
//            if ($request->get('body_' . $key))
//                $Joinus->translateOrNew($key)->body = $request->get('body_' . $key);
//        }
//        $Joinus->save();
//        return redirect(action('Admin\JoinusController@index'))->with('success','تم النشر بنجاح!');
//
//    }
    public function update(JoinusRequest $request,Joinus $Joinus)
    {
        $updateJoinus = Joinus::findOrFail($Joinus->id);
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('body_' . $key))
                $updateJoinus->translateOrNew($key)->body = $request->get('body_' . $key);
        }
        $updateJoinus->link=$request->get('link');
        $updateJoinus->save();
        return redirect(action('Admin\JoinusController@index'))->with('success','تم التعديل بنجاح');

    }


}
