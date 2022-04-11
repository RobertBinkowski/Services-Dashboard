<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class errorManager extends Controller
{
    public function __invoke(){
        return view('error.error');
    }
}
