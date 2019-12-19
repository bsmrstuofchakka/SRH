<?php

namespace App\Http\Controllers;

use App\BarcodeModel;
use App\ProfileModel;
use App\SecurityModel;
use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BarcodeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function listUserDetailsBarcode(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();


        $data['barcodeUDetails']= DB::table('profile_models')
            ->join('security_models','security_models.barcodeNumber','profile_models.bcode')
            ->select('*','security_models.id as id')
            ->paginate(15);
//dd($data);
        return view('security.barcodeUserDetailsList', $data,$data1);
    }

    /*  public function addUser(){
          return view('admin.set.userAddEdit');
      } */


    public function deleteUserDetailsBarcode(Request $request){
        SecurityModel::find($request->id)->delete();
        return redirect()->back()->with('success','You sucessfully deleted the barcode');
    }


    public function listBarcodeDetailsSearch(Request $request)
    {
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        //dd($request->searchC);
        $search = $request->searchBD;

        if($search==null)
            $data['barcodeUDetails'] =null;



        if (isset($search) && !empty($search)) {
            $data['barcodeUDetails'] = DB::table('profile_models')
                ->join('security_models','security_models.barcodeNumber','profile_models.bcode')
                ->select('*','security_models.id as id')
                ->where('security_models.id', 'like binary', '%' . $search . '%')
                ->orwhere('currentDate', 'like binary', '%' . $search . '%')
                ->orwhere('student_id', 'like binary', '%' . $search . '%')
                ->orwhere('checkin_type', 'like binary', '%' . $search . '%')
                ->orwhere('name', 'like binary', '%' . $search . '%')
                ->orwhere('department', 'like binary', '%' . $search . '%')
                ->orwhere('cnumber', 'like binary', '%' . $search . '%')
                ->orwhere('roomno', 'like binary', '%' . $search . '%')
                ->get();
        }

//dd($data);
        return view('security.barcodeUserDetailsListSearch', $data,$data1);
    }

}
