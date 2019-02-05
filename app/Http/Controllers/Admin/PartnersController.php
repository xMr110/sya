<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PartnerRequest;
use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnersController extends Controller
{
        public function index()
        {
            $partners = Partner::all();
            return view('admin.partners.index',compact('partners'));
        }

        public function create()
        {
            return view('admin.partners.create-edit');
        }
        public function edit(Partner $partner)
        {
            return view('admin.partners.create-edit',compact('partner'));
        }
        public function store(PartnerRequest $request)
        {
            $this->validate($request,['image_path' => ' image']);
            $partner = new Partner();
            if($request->hasFile('image_path'))
            {
                $partner->image_path=$request->file('image_path')->store('Partners','public');
            }
            $partner->name = $request->name;
            $partner->link = $request->link;
            $partner->save();
            return redirect(action('Admin\PartnersController@index'))->with('success','تم إضافة الشريك بنجاح ..');

        }

        public function update(PartnerRequest $request,Partner $partner)
        {
            $updatePartner = Partner::findOrFail($partner->id);
            if ($request->hasFile('image_path'))
            {
                if (file_exists(storage_path('app/public/' . $updatePartner->image_path)))
                {
                    unlink(storage_path('app/public/' . $updatePartner->image_path));
                }
                $updatePartner->image_path = $request->file('image_path')->store('Partners','public');
            }
            if ($request->get('name'))
                $updatePartner->name = $request->get('name');
            if ($request->get('link'))
                $updatePartner->link = $request->get('link');
            $updatePartner->save();
            return redirect(action('Admin\PartnersController@index'))->with('success','تم تعديل  بنجاح');

        }
    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        if (file_exists(storage_path('app/public' . $partner->image_path))) {
            unlink(storage_path('app/public/' . $partner->image_path));
        }
        $partner->delete();
        return redirect(action('Admin\PartnersController@index'))->with('success', 'تم الحذف  بنجاح!');


    }
}
