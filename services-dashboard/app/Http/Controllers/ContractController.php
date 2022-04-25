<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ContractController extends Controller
{
    public function index($id){
        $contract = \App\Models\Contract::find($id);
        $serviceName = \App\Models\Service::find($contract->service);
        $operations = \App\Models\Operation::find($id);
        return view("contract.contract",[
            'contract' => $contract,
            'service' => $serviceName,
            'operations' => $operations
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
    public function mycontracts(){
        $contracts = \App\Models\Contract::find(Auth::user()->id)->get();
        return view('contract.contracts', [
            'contracts' => $contracts,
        ]);
    }
}
