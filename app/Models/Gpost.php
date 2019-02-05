<?php

namespace App\Models;
use Dimsav\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class Gpost extends Model
{
    protected $fillable = ['image_path','type','title','body'];

}
