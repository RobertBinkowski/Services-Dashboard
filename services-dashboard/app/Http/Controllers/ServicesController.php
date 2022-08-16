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
    public function apply($id){
        return view("service.apply",[
            'service' => \App\Models\Service::find($id),
        ]);
    }
    public function createForm(){
        return view('service.create');
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
