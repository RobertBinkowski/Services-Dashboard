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

    public function getForm(){
        return view('service.signature.signature');
    }

    public function confirm(Request $request){
        // Hash Document and Signature
        $hash = Hash::make($request->signature. $request->document);

        $database = \App\Models\Signature::where('signature', $request->signature)->get();

        if(strcmp($database, $hash) == 0){
            return back()->with('success', 'The Signature and the Document have not been altered');
        }else{
            return back()->with('success', $database);
        }
    }

    public function create(Request $request){

        // Hash Both Inputs
        $hash = Hash::make($request->signature. $request->document);

        $save = new Signature;
        $save->users = $request->user;
        $save->contract = $request->contract;
        $save->signature = $request->signature;
        $save->document = $request->document;
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
