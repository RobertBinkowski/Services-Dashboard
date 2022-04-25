<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(){
        return view('search');
    }

    public function searchName(Request $request){
        $services = DB::table('services')->where([
            "name" => $request->search,
        ])->get();
        return view('search',[
            "services" => $services,
        ]);
    }

    public function searchID($id){
        $services = DB::table('services')->where([
            "id" => $id,
        ]);
        return view('search',[
            "services" => $services,
        ]);
    }
}
