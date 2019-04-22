<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use Translatable;
    public $translatedAttributes = [
        'name','type','description','address',
    ];
    protected $fillable = ['image_path','phone','site','facebook','twitter','lat','long'];
    //
    public function scopeFeatured($query){
        return $query->where('featured', 1);
    }
}
