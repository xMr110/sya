<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{

    public function index()
    {
        $certificates = Certificate::all();
        return view('admin.certificates.index',compact('certificates'));
    }

    public function create()
    {
        return view('admin.certificates.create-edit');
    }
    public function edit(Certificate $certificate)
    {
        return view('admin.certificates.create-edit',compact('certificate'));
    }
    public function store(CertificateRequest $request)
    {
        $this->validate($request,['image_path'=>'required|image']);

        $certificate = new Certificate();

        if ($request->hasFile('image_path'))
        {
            $certificate->image_path = $request->file('image_path')->store('certificates','public');
        }
        $certificate->featured = $request->has('featured') ? 1 : 0;
        if ($request->has('site'))
        $certificate->site = $request->get('site');

        if ($request->has('facebook'))
        $certificate->facebook = $request->get('facebook');

        if ($request->has('phone'))
            $certificate->phone = $request->get('phone');
        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $certificate->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('description_' . $key))
                $certificate->translateOrNew($key)->description = $request->get('description_' . $key);
        }

        $certificate->save();
        return redirect(action('Admin\CertificateController@index'))->with('success','تم الإضافة بنجاح!');

    }


    public function update($id,CertificateRequest $request)
    {
        $certificate = Certificate::findOrFail($id);
        if ($request->has('image_path'))
        {
            if (file_exists('/storage/'.$certificate->image_path))
            {
                unlink(storage_path('/storage/'.$certificate->image_path));
            }
            $certificate->image_path = $request->file('image_path')->store('certificates','public');
        }

        $certificate->featured = $request->has('featured') ? 1 : 0;
        if ($request->has('site'))
            $certificate->site = $request->get('site');

        if ($request->has('facebook'))
            $certificate->facebook = $request->get('facebook');

        if ($request->has('phone'))
            $certificate->phone = $request->get('phone');

        foreach (\Localization::getSupportedLocales() as $key => $value)
        {
            if ($request->get('name_' . $key))
                $certificate->translateOrNew($key)->name = $request->get('name_' . $key);
            if ($request->get('description_' . $key))
                $certificate->translateOrNew($key)->description = $request->get('description_' . $key);
        }

        $certificate->save();

        return redirect(action('Admin\CertificateController@index'))->with('success','تم التعديل بنجاح!');


    }


    public function destroy($id)
    {

        $deleted = Certificate::findOrFail($id);

            if (file_exists('/storage/'.$deleted->image_path))
            {
                unlink(storage_path('/storage/'.$deleted->image_path));
            }
        $deleted->delete();

        return redirect(action('Admin\CertificateController@index'))->with('success','تم الحذف بنجاح!');


    }
    public function featured($id){
        $certificate = Certificate::findOrFail($id);
        return $this->set_editable($certificate, 'featured');
    }


}
