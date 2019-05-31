<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PositionRequest;
use App\Models\Position;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PositionController extends Controller
{

    public function index()
    {
        $positions = Position::all();
        return view('admin.positions.index',compact('positions'));
    }

    public function create()
    {
        return view('admin.positions.create-edit');
    }
    public function edit(Position $position)
    {
        return view('admin.positions.create-edit',compact('position'));
    }
    public function store(PositionRequest $request)
    {
        $this->validate($request,['image_path'=>'required|image']);

        $position = new Position();

        if ($request->hasFile('image_path'))
        {
            $position->image_path = $request->file('image_path')->store('positions','public');
        }
        $position->featured = $request->has('featured') ? 1 : 0;
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $position->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('description_' . $key))
                $position->translateOrNew($key)->description = $request->get('description_' . $key);
        }

        $position->save();
        return redirect(action('Admin\PositionController@index'))->with('success','تم الإضافة بنجاح!');

    }


    public function update($id,PositionRequest $request)
    {
        $position = Position::findOrFail($id);
        if ($request->has('image_path'))
        {
            if (file_exists('/storage/'.$position->image_path))
            {
                unlink(storage_path('/storage/'.$position->image_path));
            }
            $position->image_path = $request->file('image_path')->store('positions','public');
        }

        $position->featured = $request->has('featured') ? 1 : 0;

        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $position->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('description_' . $key))
                $position->translateOrNew($key)->description = $request->get('description_' . $key);
        }

        $position->save();

        return redirect(action('Admin\PositionController@index'))->with('success','تم التعديل بنجاح!');


    }


    public function destroy($id)
    {

        $deleted = Position::findOrFail($id);

            if (file_exists('/storage/'.$deleted->image_path))
            {
                unlink(storage_path('/storage/'.$deleted->image_path));
            }
        $deleted->delete();

        return redirect(action('Admin\PositionController@index'))->with('success','تم الحذف بنجاح!');


    }
    public function featured($id){
        $position = Position::findOrFail($id);
        return $this->set_editable($position, 'featured');
    }


}
