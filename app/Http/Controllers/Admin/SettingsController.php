<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use Cache;
use Illuminate\Support\Facades\File;
use Session;
class SettingsController extends Controller
{
    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function index(){
        return view('admin.settings.edit');
    }

    public function store(Request $request){

        $settings = $this->model->rows();

        $input = $request->except(['_token', '_method']);

        if ($request->hasFile('logo')) {
            $input['logo'] = $request->file('logo')->store('basics', 'public');

            @unlink(public_path('app/public/'. $settings->logo));
        }

        if ($request->hasFile('banner')) {
            $input['banner'] = $request->file('banner')->store('basics', 'public');

            @unlink(public_path('app/public/'. $settings->logo));
        }

        if ($request->hasFile('favicon')) {
            $input['favicon'] = $request->file('favicon')->store('basics', 'public');

            @unlink(storage_path('app/public/'. $settings->favicon));
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

        return back()->with('success', 'تم الحفظ بنجاح!');
    }
}
