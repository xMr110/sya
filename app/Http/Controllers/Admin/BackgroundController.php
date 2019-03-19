<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Cache;
use Illuminate\Support\Facades\File;
use Session;
class BackgroundController extends Controller
{
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }
    public function index()
    {
        return view('admin.Background.index');
    }


    public function store(Request $request){

        $settings = $this->model->rows();

        $input = $request->except(['_token', '_method']);
        if ($request->hasFile('main_Background')) {
            $input['main_Background'] = $request->file('main_Background')->store('Backgrounds', 'public');

            @unlink(public_path('app/public/'. $settings->main_Background));
        }

        if ($request->hasFile('Joinus_Background')) {
            $input['Joinus_Background'] = $request->file('Joinus_Background')->store('Backgrounds', 'public');

            @unlink(public_path('app/public/'. $settings->Joinus_Background));
        }
        if ($request->hasFile('initiative_Background')) {
            $input['initiative_Background'] = $request->file('initiative_Background')->store('Backgrounds', 'public');

            @unlink(public_path('app/public/'. $settings->initiative_Background));
        }

        if ($request->hasFile('Ourteam_Background')) {
            $input['Ourteam_Background'] = $request->file('Ourteam_Background')->store('Backgrounds', 'public');

            @unlink(storage_path('app/public/'. $settings->Ourteam_Background));
        }
        if ($request->hasFile('contactus_Background')) {
            $input['contactus_Background'] = $request->file('contactus_Background')->store('Backgrounds', 'public');

            @unlink(storage_path('app/public/'. $settings->contactus_Background));
        }
        if ($request->hasFile('Blog_subheader')) {
            $input['Blog_subheader'] = $request->file('Blog_subheader')->store('Backgrounds', 'public');

            @unlink(storage_path('app/public/'. $settings->Blog_subheader));
        }
        if ($request->hasFile('Guest_subheader')) {
            $input['Guest_subheader'] = $request->file('Guest_subheader')->store('Backgrounds', 'public');

            @unlink(storage_path('app/public/'. $settings->Guest_subheader));
        }
        if ($request->hasFile('About_subheader')) {
            $input['About_subheader'] = $request->file('About_subheader')->store('Backgrounds', 'public');

            @unlink(storage_path('app/public/'. $settings->About_subheader));
        }
        if ($request->hasFile('What_subheader')) {
            $input['What_subheader'] = $request->file('What_subheader')->store('Backgrounds', 'public');

            @unlink(storage_path('app/public/'. $settings->What_subheader));
        }
        if ($request->hasFile('Apply_subheader')) {
            $input['Apply_subheader'] = $request->file('Apply_subheader')->store('Backgrounds', 'public');

            @unlink(storage_path('app/public/'. $settings->Apply_subheader));
        }
       if ($request->hasFile('Write_subheader')) {
                $input['Write_subheader'] = $request->file('Write_subheader')->store('Backgrounds', 'public');

                @unlink(storage_path('app/public/'. $settings->Write_subheader));
            }
       if ($request->hasFile('Company_subheader')) {
                $input['Company_subheader'] = $request->file('Company_subheader')->store('Backgrounds', 'public');

                @unlink(storage_path('app/public/'. $settings->Company_subheader));
            }
       if ($request->hasFile('Person_subheader')) {
                $input['Person_subheader'] = $request->file('Person_subheader')->store('Backgrounds', 'public');

                @unlink(storage_path('app/public/'. $settings->Person_subheader));
            }


        foreach ($input as $key => $value) {
            if(!is_null($value))
                $this->model->set($key, $value);
        }

        Cache::forget('site_settings');
        $settings = Cache::rememberForever('site_settings', function () {
            $settings = $this->model->rows();
            return $settings;
        });

        return back()->with('success', 'تم حفظ الصور بنجاح!');
    }


}
