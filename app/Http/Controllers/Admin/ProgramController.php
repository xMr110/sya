<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProgramRequest;
use App\Models\Program;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProgramController extends Controller
{

    public function index()
    {
        $programs = Program::all();
        return view('admin.programs.index',compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create-edit');
    }
    public function edit(Program $program)
    {
        return view('admin.programs.create-edit',compact('program'));
    }
    public function store(ProgramRequest $request)
    {
        $this->validate($request,['image_path'=>'required|image']);

        $program = new Program();

        if ($request->hasFile('image_path'))
        {
            $program->image_path = $request->file('image_path')->store('programs','public');
        }
        $program->featured = $request->has('featured') ? 1 : 0;
        if ($request->has('site'))
        $program->site = $request->get('site');

        if ($request->has('facebook'))
        $program->facebook = $request->get('facebook');

        if ($request->has('phone'))
            $program->phone = $request->get('phone');
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $program->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('description_' . $key))
                $program->translateOrNew($key)->description = $request->get('description_' . $key);
        }

        $program->save();
        return redirect(action('Admin\ProgramController@index'))->with('success','تم الإضافة بنجاح!');

    }


    public function update($id,ProgramRequest $request)
    {
        $program = Program::findOrFail($id);
        if ($request->has('image_path'))
        {
            if (file_exists('/storage/'.$program->image_path))
            {
                unlink(storage_path('/storage/'.$program->image_path));
            }
            $program->image_path = $request->file('image_path')->store('programs','public');
        }

        $program->featured = $request->has('featured') ? 1 : 0;
        if ($request->has('site'))
            $program->site = $request->get('site');

        if ($request->has('facebook'))
            $program->facebook = $request->get('facebook');

        if ($request->has('phone'))
            $program->phone = $request->get('phone');

        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $program->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('description_' . $key))
                $program->translateOrNew($key)->description = $request->get('description_' . $key);
        }

        $program->save();

        return redirect(action('Admin\ProgramController@index'))->with('success','تم التعديل بنجاح!');


    }


    public function destroy($id)
    {

        $deleted = Program::findOrFail($id);

            if (file_exists('/storage/'.$deleted->image_path))
            {
                unlink(storage_path('/storage/'.$deleted->image_path));
            }
        $deleted->delete();

        return redirect(action('Admin\ProgramController@index'))->with('success','تم الحذف بنجاح!');


    }
    public function featured($id){
        $program = Program::findOrFail($id);
        return $this->set_editable($program, 'featured');
    }


}
