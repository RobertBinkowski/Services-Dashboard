<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function show($id){
        return view('service.service', [
            'service' => \App\Models\Service::findOrFail($id),
        ]);
    }
    public function myservices(){

        $services = DB::table('services')->where([
            'users' => \App\Models\User::class
        ])->get();
        return view('service.myservices', [
            'services' => $services,
        ]);
    }
}
