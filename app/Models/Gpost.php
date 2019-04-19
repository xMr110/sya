<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Gpost extends Model
{
	use Translatable;

    public $translatedAttributes = [
        'title', 'body'
    ];
    protected $fillable = ['image_path','type','title_origin','body_origin'];

}
