<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GpostTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title','body'];
}
