<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index(){
        $user = DB::table('users')->where([
            'id' => Auth::id()
        ])->first();
        return view('user.account', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        DB::table('users')
              ->where('id', Auth::id())
              ->update([
                'name' => $request->name,
                'email' => $request->email,
                'address' => $request->address,
                'password' => $request->password,
            ]);


        return back()->with('success', 'Form successfully changed details');
    }
    public function delete($id){
        $data = User::find($id);
        $data->delete();
        return back()->with('success', 'successfully Deleted');
    }
}
