<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Signature;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SignatureController extends Controller
{
    // public function index($id){
    //     $signature = \App\Models\Signature::find($id);
    //     return view('contract.contract');
    // }

    public function find($id){
        return view('service.service', [
            'service' => \App\Models\Service::find($id),
        ]);
    }
    public function name($name){
        return view('service.service', [
            'service' => \App\Models\Service::find($name),
        ]);
    }
    public function confirm($signature, $hash){
        if($hash == Hash::make($signature)){
            return back()->with('success', 'The Signature is correct');
        }else{
            return back()->with('Error', 'The Signature has been altered');
        }
    }

    public function create(Request $request){
        $hash = Hash::make($request->hash);
        $save = new Signature;
        $save->users = $request->user;
        $save->contract = $request->contract;
        $save->hash = $hash;
        $save->save();
        return back()->with('success', 'Form successfully created');
    }

    public function delete($id){
        $data = Signature::find($id);
        $data->delete();
        return back()->with('success', 'successfully Deleted');
    }
}
