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
        $cost = \App\Models\Operation::where('contracts', $id)->sum('duration');
        $contract = \App\Models\Contract::find($id);
        $serviceName = \App\Models\Service::find($contract->service);
        $operations = \App\Models\Operation::where('contracts',$id)->get();
        // Calculate Cost And update The Database
        $cost = $serviceName->price * $cost;
        DB::table('contracts')
            ->where('id', $id)
            ->limit(1)
            ->update([
            'cost' => $cost,
        ]);
        // Display Slide
        return view("contract.contract",[
            'contract' => $contract,
            'service' => $serviceName,
            'operations' => $operations
        ]);
    }
    public function store(Request $request)
    {
        //Save Signature as IMG
        // $folderPath = public_path('signs/');
        // $image_parts = explode(";base64,", $request->signed);
        // $image_type_aux = explode("image/", $image_parts[0]);
        // $image_type = $image_type_aux[1];
        // $image_base64 = base64_decode($image_parts[1]);
        // $signature = uniqid() . '.'.$image_type;
        // $file = $folderPath . $signature;
        // file_put_contents($file, $image_base64);

        // Contract
        $contract = new Contract;
        $contract->address = $request->address;
        $contract->details = $request->details;
        $contract->document = $request->contract;
        $contract->users = $request->name;
        $contract->customer_signature = $request->signature;
        $contract->service = $request->service;
        $contract->save();

        // Hash and save Signature
        $hash = Hash::make($request->signature. $request->contract);
        // Signature
        $signature = new Signature;
        $signature->users = $request->name;
        $signature->contract = $contract->id;
        $signature->signature = $request->signature;
        $signature->document = $request->contract;
        $signature->hash = $hash;
        $signature->save();

        return back()->with('success', 'Form successfully');
    }
    public function acceptContract(Request $request){
        // Contract
        DB::table('contracts')
              ->where('id', $request->contractID)
              ->limit(1)
              ->update([
                'specialist_signature' => $request->signature,
                'status' => 'Active',
            ]);

        // Hash and save Signature
        $hash = Hash::make($request->signature. $request->contract);
        // Signature
        $signature = new Signature;
        $signature->users = $request->id;
        $signature->contract = $request->contractID;
        $signature->signature = $request->signature;
        $signature->document = $request->contract;
        $signature->hash = $hash;
        $signature->save();

        return back()->with('success', 'Successfully accepted service');
    }

    public function rejectContract(Request $request){
        DB::table('contracts')
              ->where('id', $request->id)
              ->limit(1)
              ->update([
                'status' => 'Cancelled',
            ]);

        return back()->with('success', 'Successfully rejected service');
    }

    public function mycontracts(){
        $contracts = DB::table('contracts')->where([
            'users' => Auth::id()
        ])->get();
        return view('contract.contracts', [
            'contracts' => $contracts,
        ]);
    }
    public function complete($id){
        DB::table('contracts')
              ->where('id', $id)
              ->limit(1)
              ->update([
                'status' => 'Payment',
            ]);
            return back()->with('success', 'successfully updated');
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
