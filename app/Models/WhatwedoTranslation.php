<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhatwedoTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','body'];
}
