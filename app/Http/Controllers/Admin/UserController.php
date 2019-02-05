<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PHPUnit\Framework\Constraint\Count;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }
    public function create()
    {
        return view('admin.users.create-edit');
    }
    public function edit(User $user)
    {

        return view('admin.users.create-edit',compact('user'));

    }
    public function store(UserRequest $request)
    {
        $this->validate($request, ['password'=>'required|confirmed']);
        $user = new User($request->except('password'));
        $user->password = bcrypt($request->password);
        $this->validate($request,['image_path' => ' image']);
        if($request->hasFile('image_path'))
        {
            $user->image_path=$request->file('image_path')->store('users/ProfileImg','public');
        }
        $user->save();
        return redirect(action('Admin\UserController@index'))->with('success','تم إضافة المستخدم بنجاح ..');
    }
    public function update(UserRequest $request,User $user)
    {
        if($request->hasFile('image_path'))
        {
            if(file_exists(storage_path('app/public'.$user->image_path)))
            {
                unlink(storage_path('app/public'.$user->image_path));
            }
            $user->image_path=$request->file('image_path')->store('users/ProfileImg','public');
        }
        $user->save();

        $user->update($request->except(['password']));
        if($request->has(['password']))
        {
            $this->validate($request,['password'=>'confirmed']);

            $user->update(['password'=>bcrypt($request->get('password'))]);
        }
        return back()->with('success','تم تعديل بيانات المدير بنجاح !');

    }

    public function  destroy($id)
    {
     if(count(User::all())<=2)
         return back()->with('warning','لا يمكنك حذف المدير !');
User::destroy($id);

        return redirect(action('Admin\UserController@index'))->with('success','تم حذف المدير بنجاح !');

    }
}
