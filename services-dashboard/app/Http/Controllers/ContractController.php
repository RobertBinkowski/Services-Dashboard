<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;
use \App\Models\Signature;
use Illuminate\Support\Facades\Hash;
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
        // $folderPath = public_path('signs/');
        // $image_parts = explode(";base64,", $request->signed);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);
        // $signature = uniqid() . '.'.$image_type;
        // $file = $folderPath . $signature;
        // file_put_contents($file, $image_base64);

        // Contract
        $save = new Contract;
        $save->address = $request->address;
        $save->details = $request->details;
        $save->users = $request->name;
        $save->signature = $request->signature;
        $save->service = $request->service;
        $save->save();

        // Create Signature
        $hash = Hash::make($request->signature);
        $save = new Signature;
        $save->users = $request->name;
        $save->contract = $request->contract;
        $save->hash = $hash;
        $save->save();

        return back()->with('success', 'Form successfully submitted with signature');
    }
    public function mycontracts(){
        $contracts = DB::table('contracts')->where([
            'users' => Auth::id()
        ])->get();
        return view('contract.contracts', [
            'contracts' => $contracts,
        ]);
    }
    public function update(Request $request){
        DB::table('contracts')
              ->where('id', $request->id)
              ->limit(1)
              ->update([
                'details' => $request->details,
                'address' => $request->address,
            ]);
            return back()->with('success', 'successfully updated');
    }
    public function delete($id){
        $data = Contract::find($id);
        $data->delete();
        return back()->with('success', 'successfully Deleted');
    }
}
