<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Initiative extends Model
{
    use Translatable;
    public $translatedAttributes = [
        'name','description'
    ];
    protected $fillable = ['image_path','phone','site','facebook','lat','long'];
    //
    public function scopeFeatured($query){
        return $query->where('featured', 1);
    }
}
