<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable
        = [
            'key',
            'value',
        ];

    protected $casts
        = [
            'value' => 'array',
        ];

    public $timestamps = false;

    protected static $rows
        = [
            'title'                 => '',
            'subtitle'              => '',
            'links'                 => '',
            'address'               => '',
            'phone'                 => '',
            'email'                 => '',
            'favicon'               => '',
            'logo'                  => '',
            'banner'                => '',
            'main_Background'       => '',
            'Joinus_Background'     => '',
            'Ourteam_Background'    => '',
            'contactus_Background'  => '',
            'initiative_Background' => '',
            'donate_Background' => '',
            'Blog_subheader'                => '',
            'Guest_subheader'                => '',
            'About_subheader'                => '',
            'What_subheader'                => '',
            'Apply_subheader'                => '',
            'Write_subheader'                => '',
            'Company_subheader'                => '',
            'Person_subheader'                => '',


        ];


    public static function get($key, $default = '')
    {
        $get = self::where('key', $key)->first();
        if ( ! count($get)) {
            return $default;
        }

        return $get->value;
    }


    public static function set($key, $value)
    {
        $set = self::where('key', $key)->first();

        if ( ! isset($set)) {
            $set = self::firstOrCreate([
                'key'   => $key,
                'value' => $value,
            ]);
        } else {
            $set->update(['value' => $value]);
        }

        return $set;
    }


    public static function forget($key)
    {
        $forget = self::where('key', $key)->first();
        if (count($forget)) {
            return $forget->delete();
        }
    }

    public static function rows()
    {
        $items = self::all();

        $settings = self::$rows;
        foreach ($items as $item) {
            $settings[$item->key] = $item->value;
        }

        return (OBJECT)$settings;
    }
}
