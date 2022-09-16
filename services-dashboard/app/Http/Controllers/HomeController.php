<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $services = DB::table('services')->where([
            'users' => Auth::id()
        ])->get();

        $contracts = DB::table('contracts')->where([
            'users' => Auth::id()
        ])->get();

        // Jobs
        // $jobs = DB::table('contracts')->where([
        //     'service' => Auth::id() //Change
        // ])->get();

        $jobs = DB::table('contracts')->get();

        // $jobs = DB::table('contracts')->DB::table('services');


        return view('home',['services'=>$services,'contracts'=> $contracts, 'jobs' => $jobs]);
    }
}
