<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InitiativeTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name','description','type','address'];
}
