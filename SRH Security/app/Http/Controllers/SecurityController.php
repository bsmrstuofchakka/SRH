<?php

namespace App\Http\Controllers;

use App\SecurityModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SecurityController extends Controller
{
    function index(){
        $userId = Auth::user()->id;
        $data1['userTable'] = DB::table('users')
            ->where('users.id', '=', $userId)
            ->first();
        return view('checkin', $data1);
    }
    function add_checkin(Request $request){
        $checkin=new SecurityModel();
        $checkin->checkin_type=$request->checkin_type;
        $checkin->barcodeNumber=$request->barcode;
        $checkin->save();
        return redirect('/checkin')->with('message','Check In or Out Successfully Updated');
    }
}
