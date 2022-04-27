<?php

namespace App\Http\Controllers;

use App\Models\Operation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OperationController extends Controller
{
    public function create(Request $request)
    {
        $save = new Operation;
        $save->start_date = $request->start_date;
        $save->end_date = $request->end_date;
        $save->duration = $request->duration;
        $save->contract = $request->contract;
        $save->save();


        return back()->with('success', 'Form successfully submitted with signature');
    }
    public function createForm($id){
        return view('operation.operation',["contract" => $id]);
    }
    public function update(Request $request){
        DB::table('operation')
              ->where('id', $request->id)
              ->limit(1)
              ->update([
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
                'duration' => $request->duration,
                'contract' => $request->contract,
            ]);
            return back()->with('success', 'Successfully updated');
    }
    public function delete($id){
        $data = Operation::find($id);
        $data->delete();
        return back()->with('success', 'Successfully Deleted');
    }
}
