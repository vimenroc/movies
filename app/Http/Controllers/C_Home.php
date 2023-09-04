<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Home extends Controller
{

    public function __construct(){

    }

    function index(){
        return view('home.index');
    }
}
