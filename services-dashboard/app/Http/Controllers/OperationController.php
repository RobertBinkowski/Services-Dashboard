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
        $save->date = $request->date;
        $save->duration = $request->duration;
        $save->contracts = $request->contract;
        $save->save();

        // Count Contract Price

        return back()->with('success', 'Form successfully submitted');
    }
    public function createForm($id){
        return view('operation.operation',["contract" => $id]);
    }
    public function edit($id){
        $data = Operation::find($id);
        return view('operation.edit',["operation" => $data]);
    }
    public function update(Request $request){
        DB::table('operation')
              ->where('id', $request->id)
              ->limit(1)
              ->update([
                'date' => $request->date,
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
