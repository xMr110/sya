<?php

namespace App\Http\Controllers;

use App\Models\Initiative;
use Illuminate\Http\Request;

class InitiativeController extends Controller
{
    //



    public function index()
    {
        $initiatives = Initiative::all();
        return view('layouts.initiative.index',compact('initiatives'));
    }
    public function getImage()
    {
        $id = $_GET['id'];
        $initiative = Initiative::findOrFail($id);
        $html = '';
        $html =$html.'<div style="padding: 10px 10px 10px 10px;">
                <img  src="' . url('/storage/'.$initiative->image_path) . '" style="max-width:100%;  max-height:100%;"></div>';
        return $html;
    }
    public function getMap()
    {
        $id = $_GET['id'];
        $initiative = Initiative::findOrFail($id);
        $html = '';
        $html =$html.'<input type="text" class="form-control form-control-line"
                           name="long"
                           placeholder="احداثيات خط الطول"
                           value='.$initiative->long.'
                           style="display: none"/>  <input type="text" class="form-control form-control-line"
                           name="lat"
                           placeholder="احداثيات خط العرض"
                           value='.$initiative->lat.'
                           style="display: none"/>';
        return $html;
    }
}
