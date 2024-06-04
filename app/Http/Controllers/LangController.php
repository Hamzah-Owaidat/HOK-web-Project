<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLang($locale){
        if(in_array($locale,['en','ar','fr'])){
            session()->put('locale',$locale);
        }
        return redirect()->back();
    }
}
