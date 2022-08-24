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
    public function complete(Request $request){
        DB::table('contracts')
            ->where('service', $request->id)
            ->limit(1)
            ->update([
            'status' => 'Payment',
        ]);
        return back()->with('success', 'Form successfully Completed, Requesting Payment');
    }
    //Review Section
    public function reviewPage($id){
        return view('service.review.review', [
            'contract' => \App\Models\Contract::find($id),
        ]);
    }
    public function review(Request $request){

        if( Service::find($request->service)->reviews == null){
            $reviews = 0;
        }else{
            $reviews = Service::find($request->id)->reviews;
        }
        $reviews = $reviews + 1;
        $score = Service::find($request->id)->score + $request->score;
        $rating = $score / $reviews;

        DB::table('services')
            ->where('id', $request->service)
            ->limit(1)
            ->update([
                'rating' => $rating,
                'score' => $score,
                'reviews' => $reviews,
            ]);
        return back()->with('success', 'Thank you for the Review');
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
