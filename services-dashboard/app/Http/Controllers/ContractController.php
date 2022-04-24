<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

class ContractController extends Controller
{
    public function index($id){
        return view("service.apply",[
            'service' => \App\Models\Service::findOrFail($id),
        ]);
    }

    public function store(Request $request)
    {
        //Save Signature
        $folderPath = public_path('signs/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.'.$image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);

        $save = new Contract;
        $save->address = $request->address;
        $save->document = $signature;
        $save->details = $request->details;
        $save->users = $request->name;
        $save->service = $request->service;
        $save->save();


        return back()->with('success', 'Form successfully submitted with signature');
    }
}
