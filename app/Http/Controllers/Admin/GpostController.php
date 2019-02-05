<?php

namespace App\Http\Controllers\Admin;

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
}
