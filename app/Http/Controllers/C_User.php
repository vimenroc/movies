<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_User extends Controller
{
    //.
    function show(string $id)
    {
        return $id;
        // return view('user.profile')->with('id', $id);
    }
}
