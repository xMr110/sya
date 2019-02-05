<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OurteamRequest;
use App\Models\Ourteam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OurteamsController extends Controller
{
    public function index()
    {
        $ourteams= Ourteam::all();
        return view('admin.ourteams.index',compact('ourteams'));
    }
    public function create()
    {
        return view('admin.ourteams.create-edit');
    }
    public function edit($id)
    {
        $ourteam = Ourteam::findOrFail($id);
        return view('admin.ourteams.create-edit',compact('ourteam'));
    }
    public function store(OurteamRequest $request)
    {
//        return $request->all();
        $member = new Ourteam($request->all());
        if($request->hasFile('image_path'))
        {
            $member->image_path=$request->file('image_path')->store('OurTeam','public');
        }
        $social = [
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'linkedin' => $request->get('linkedin'),
            'google' => $request->get('google'),
        ];
        $member->social = json_encode($social);
        $member->save();
        return back()->with('success', 'تم');
    }

    public function update(OurteamRequest $request,$id)
    {
        $ourteam = Ourteam::findOrFail($id);
        if($request->hasFile('image_path'))
        {
            $ourteam->image_path=$request->file('image_path')->store('OurTeam','public');
        }
        $ourteam->name = $request->get('name');
        $ourteam->job_title = $request->get('job_title');
        $social = [
            'facebook' => $request->get('facebook'),
            'instagram' => $request->get('instagram'),
            'linkedin' => $request->get('linkedin'),
            'google' => $request->get('google'),
        ];
        $ourteam->social = json_encode($social);
        $ourteam->save();
        return redirect(action('Admin\OurteamsController@index'))->with('success','تم التعديل بنجاح');

    }
    public function destroy($id)
    {
        $member = Ourteam::findOrFail($id);
        if (file_exists(storage_path('app/public' . $member->image_path))) {
            unlink(storage_path('app/public/' . $member->image_path));
        }
        $member->delete();
        return redirect(action('Admin\OurteamsController@index'))->with('success', 'تم حذف العضو بنجاح!');

    }
}
