<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use Translatable;

    public $translatedAttributes = [
        'name', 'description'
    ];


        protected $fillable = ['image_path','site'];


    public function scopeFeatured($query){
        return $query->where('featured', 1);
    }
}
