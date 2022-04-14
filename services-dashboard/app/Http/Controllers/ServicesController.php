<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;

class ServicesController extends Controller
{
    public function show($id){
        return view('service.service', [
            'service' => \App\Models\Service::findOrFail($id),
        ]);
    }
}
