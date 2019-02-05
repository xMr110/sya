<?php

namespace App\Models;
use Dimsav\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class Joinus extends Model
{
    use Translatable;

    public $translatedAttributes = [
         'body'
    ];
    protected $fillable = ['link'];
}
