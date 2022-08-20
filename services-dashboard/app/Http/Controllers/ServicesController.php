<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ServicesController extends Controller
{
    public function index(){
        return view('service');
    }

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
    public function myservices(){

        $services = DB::table('services')->where([
            'users' => Auth::id()
        ])->get();
        return view('service.myservices', [
            'services' => $services,
        ]);
    }
    public function apply(Request $request){
        return view("service.apply",[
            'service' => \App\Models\Service::find($request->id),
        ]);
    }
    public function createForm(){
        return view('service.create');
    }
    public function complete(Request $requsert){
        DB::table('contracts')
            ->where('service', $requsert->id)
            ->limit(1)
            ->update([
            'status' => 'Payment',
        ]);
        return back()->with('success', 'Form successfully Completed, Requesting Payment');
    }
    //Payment Section
    public function paymentPage($id){
        return view('service.payment.payment', [
            'contract' => \App\Models\Contract::find($id),
        ]);
    }
    public function payment(Request $requsert){

        // Reviews
        $reviews = 0;
        $score = $requsert->score;
        $rating = $reviews / $score;

        DB::table('services')
            ->where('id', $requsert->service)
            ->limit(1)
            ->update([
                'rating' => $rating,
                'score' => $score,
                'reviews' => $reviews,
            ]);

        // Set As Complete
        // DB::table('contracts')
        //     ->where('service', $requsert->id)
        //     ->limit(1)
        //     ->update([
        //     'status' => 'Complete',
        // ]);
        return back()->with('success', 'Form successfully Completed, Payment Went Through');
    }

    public function create(Request $request){
        $save = new Service;
        $save->address = $request->address;
        $save->name = $request->name;
        $save->users = $request->user;
        $save->range = $request->range;
        $save->price = $request->price;
        $save->contract = $request->contract;
        $save->save();

        return back()->with('success', 'Form successfully created');
    }
    public function edit($id){
        $service = Service::find($id);
        return view('service.edit',[
            "service" => $service
        ]);
    }

    public function update(Request $request){
        DB::table('services')
              ->where('id', $request->id)
              ->limit(1)
              ->update([
                'name' => $request->name,
                'range' => $request->range,
                'address' => $request->address,
                'price' => $request->price,
                'contract' => $request->contract,
                'users' => $request->users,
            ]);
            return back()->with('success', 'successfully updated');
    }
    public function delete($id){
        $data = Service::find($id);
        $data->delete();
        return back()->with('success', 'successfully Deleted');
    }
}
