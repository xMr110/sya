<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\WhatwedoRequest;
use App\Models\Whatwedo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WhatwedoController extends Controller
{
    public function index()
    {
        $Project_Activits = Whatwedo::all();
        return view('admin.whatwedos.index',compact('Project_Activits'));
    }
    public function create()
    {
        return view('admin.whatwedos.create-edit');
    }
    public function edit($id)
    {
        $Project_Activit = Whatwedo::findOrFail($id);
        return view('admin.whatwedos.create-edit',compact('Project_Activit'));
    }
    public function store(WhatwedoRequest $request)
    {
        $this->validate($request,['image_path'=> 'required|image']);
        $whatwedo = new Whatwedo();
        $whatwedo->user_id = Auth::id();
        if($request->hasFile('image_path'))
        {
            $whatwedo->image_path= $request->file('image_path')->store('whatwedo','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key))
                $whatwedo->translateOrNew($key)->title = $request->get('title_' . $key);
            if ($request->get('body_' . $key))
                $whatwedo->translateOrNew($key)->body = $request->get('body_' . $key);
        }
        $whatwedo->Date = $request->get('Date');
        $whatwedo->type = $request->get('type');
        $whatwedo->save();

        return redirect(action('Admin\WhatwedoController@index'))->with('success','تم  الإضافة بنجاح!');
    }

    public  function update(WhatwedoRequest $request,$id)
    {

        $Project_Activit = Whatwedo::findOrFail($id);
        $Project_Activit->user_id = Auth::id();
        if ($request->hasFile('image_path'))
        {
            if (file_exists(storage_path('app/public/' . $Project_Activit->image_path)))
            {
                unlink(storage_path('app/public/' . $Project_Activit->image_path));
            }
            $Project_Activit->image_path= $request->file('image_path')->store('whatwedo','public');

        }

        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key))
                $Project_Activit->translateOrNew($key)->title = $request->get('title_' . $key);
            if ($request->get('body_' . $key))
                $Project_Activit->translateOrNew($key)->body = $request->get('body_' . $key);
        }
        $Project_Activit->Date = $request->get('Date');
        $Project_Activit->type = $request->get('type');
        $Project_Activit->save();

        return redirect(action('Admin\WhatwedoController@index'))->with('success','تم  التعديل بنجاح!');


    }
    public function destroy($id)
    {
        $deleted = Whatwedo::findOrFail($id);

        if (file_exists($deleted->image_path))
        {
            unlink(storage_path('/storage/'.$deleted->image_path));
        }
        $deleted->delete();

        return redirect(action('Admin\WhatwedoController@index'))->with('success','تم  الحذف بنجاح!');



    }
}
