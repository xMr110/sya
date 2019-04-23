<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\initiativeRequest;
use App\Models\Initiative;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InitiativeController extends Controller
{

    public function index()
    {
        $initiatives = Initiative::all();

        return view('admin.initiative.index',compact('initiatives'));
    }
    public function create()
    {
        return view('admin.initiative.create-edit');
    }
    public function edit(Initiative $initiative)
    {
        return view('admin.initiative.create-edit',compact('initiative'));
    }
    public function update(Initiative $initiative,initiativeRequest $request)
    {


        if ($request->hasFile('image_path'))
        {
            if (file_exists(storage_path('app/public/' . $initiative->image_path)))
            {
                unlink(storage_path('app/public/' . $initiative->image_path));
            }
            $initiative->image_path = $request->file('image_path')->store('initiative','public');
        }
        $initiative->featured = $request->has('featured') ? 1 : 0;
        if($request->has('site'))
            $initiative->site=$request->site;
        if($request->has('facebook'))
            $initiative->facebook=$request->facebook;
        if($request->has('twitter'))
            $initiative->twitter=$request->twitter;
        if($request->has('email'))
            $initiative->email=$request->email;
        if($request->has('lat'))
            $initiative->lat=$request->lat;
        if($request->has('long'))
            $initiative->long=$request->long;
        $initiative->phone=$request->phone;

        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $initiative->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('type_' . $key))
                $initiative->translateOrNew($key)->type = $request->get('type_' . $key);
            if ($request->get('address_' . $key))
                $initiative->translateOrNew($key)->address = $request->get('address_' . $key);
            if ($request->get('description_' . $key))
                $initiative->translateOrNew($key)->description = $request->get('description_' . $key);
        }

        $initiative->save();

        return redirect(action('Admin\InitiativeController@index'))->with('success','تم التعديل بنجاح!');

    }
    public function store(initiativeRequest $request)
    {
        $this->validate($request,['image_path'=> 'required|image']);
        $initiative = new Initiative();
        if($request->hasFile('image_path'))
        {
            $initiative->image_path= $request->file('image_path')->store('initiatives','public');
        }
        $initiative->featured = $request->has('featured') ? 1 : 0;
        if($request->has('site'))
        $initiative->site=$request->site;
        if($request->has('facebook'))
            $initiative->facebook=$request->facebook;
        if($request->has('twitter'))
            $initiative->twitter=$request->twitter;
        if($request->has('email'))
            $initiative->email=$request->email;
        if($request->has('lat'))
            $initiative->lat=$request->lat;
        if($request->has('long'))
            $initiative->long=$request->long;
        $initiative->phone=$request->phone;

        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $initiative->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('type_' . $key))
                $initiative->translateOrNew($key)->type = $request->get('type_' . $key);
            if ($request->get('address_' . $key))
                $initiative->translateOrNew($key)->address = $request->get('address_' . $key);
            if ($request->get('description_' . $key))
                $initiative->translateOrNew($key)->description = $request->get('description_' . $key);
        }
        $initiative->save();

        return redirect(action('Admin\InitiativeController@index'))->with('success','تم الإنشاء بنجاح!');
    }

    public function destroy($id)
    {

        $deleted = Initiative::findOrFail($id);

            if (file_exists('/storage/'.$deleted->image_path))
            {
                unlink(storage_path('/storage/'.$deleted->image_path));
            }
        $deleted->delete();

        return redirect(action('Admin\InitiativeController@index'))->with('success','تم الحذف بنجاح!');


    }

    public function featured($id){
        $initiative = Initiative::findOrFail($id);
        return $this->set_editable($initiative, 'featured');
    }

}
