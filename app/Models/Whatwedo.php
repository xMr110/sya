<?php

namespace App\Models;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Whatwedo extends Model
{
    use Translatable;

    public $translatedAttributes = [
        'title', 'body'
    ];
    protected $fillable = [
        'image_path','Date','type'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
