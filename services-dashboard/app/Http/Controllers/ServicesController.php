<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index($id){
        return view('service.service', [
            'service' => \App\Models\Service::find($id),
        ]);
    }
    public function name($name){
        return view('service.service', [
            'service' => \App\Models\Service::find($name),
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
    public function apply($id){
        return view("service.apply",[
            'service' => \App\Models\Service::find($id),
        ]);
    }
}
