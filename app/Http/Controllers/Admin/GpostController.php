<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GpostRequest;
use App\Models\Gpost;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GpostController extends Controller
{
    public function index()
    {
        $gposts=Gpost::all();
        return view('admin.gposts.index',compact('gposts'));
    }
    public function show($id)
    {
        $gpost = Gpost::findOrFail($id);
        return view('admin.gposts.show',compact('gpost'));
    }
  public function Approv(Gpost $gpost)
  {
      $gpost = Gpost::findOrFail($gpost->id);
      $gpost->status = 1;
      $id = Auth::user()->id;
      $admin = User::findOrFail($id);
      $gpost->checked_by = $admin->name;
      //filling translations
      foreach (\Localization::getSupportedLocales() as $key => $value)
      {
          if ($gpost->writing_language == $key){
            $gpost->translateOrNew($key)->title = $gpost->title_origin;
            $gpost->translateOrNew($key)->body = $gpost->body_origin;
          }
          else{
            $gpost->translateOrNew($key)->title = Null;
            $gpost->translateOrNew($key)->body = Null;
          }
      }
      $gpost->save();
      return redirect(action('Admin\GpostController@index'))->with('success', 'تم الموافقة على التدوينة بنجاح !');
  }
  public function reject(Gpost $gpost)
  {
      $gpost = Gpost::findOrFail($gpost->id);
      $gpost->status = 2;
      $id = Auth::user()->id;
      $admin = User::findOrFail($id);
      $gpost->checked_by = $admin->name;
      $gpost->save();
      return redirect(action('Admin\GpostController@index'))->with('success', 'تم رفض التدوينة !');


  }
  public function destroy($id)
    {
        $post = Gpost::findOrFail($id);
        if (file_exists(storage_path('app/public' . $post->image_path))) {
            unlink(storage_path('app/public/' . $post->image_path));
        }
        $post->delete();
        return redirect(action('Admin\GpostController@index'))->with('success', 'تم حذف التدوينة بنجاح!');


    }

    public function edit($id)
    { 
      $gpost = Gpost::findOrFail($id);
      return view('admin.gposts.edit',compact('gpost'));
    }

    public function update(Gpost $gpost, GpostRequest $request)
    {
        $UpdateGpost = Gpost::findOrFail($gpost->id);
        if ($request->hasFile('image_path'))
        {
            if (file_exists(storage_path('app/public/' . $UpdateGpost->image_path)))
            {
                unlink(storage_path('app/public/' . $UpdateGpost->image_path));
            }
            $UpdateGpost->image_path = $request->file('image_path')->store('gposts','public');
        }
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('title_' . $key))
                $UpdateGpost->translateOrNew($key)->title = $request->get('title_' . $key);
            if ($request->get('body_' . $key))
                $UpdateGpost->translateOrNew($key)->body = $request->get('body_' . $key);
        }
        $UpdateGpost->save();
        return redirect(action('Admin\GpostController@index'))->with('success','تم تعديل المنشور بنجاح');

    }
}
