<?php

namespace App\Http\Controllers;



use App\ContactInfoModel;
use App\NomineeInfoModel;
use App\ProfileModel;
use App\User;
use App\PhotoModel;
use App\ProfessionalInfoModel;
//use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;


class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function changePassword(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();


        $data1['cPassword']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        return view('profiles.passwordChange',$data1);
    }
    public function savePassword(Request $request){

        if (Hash::check($request->current_password, auth()->user()->password)==false)
                        return Redirect()->back()->with('success','Unsuccessful,Please try again');

        $validator = \Validator::make($request->all(), [
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
            ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()->with('success','Unsuccessful,Please try again');
        }


        $trueornot=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);






            if($trueornot==true){
            return Redirect()->back()->with('success','You sucessfully change your password');
        }else {
            return Redirect()->back()->with('success','Unsuccessful,Please try again');
        }



    }
    public function editPersonalInfo(){
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        $data['personal'] = User::where('id',Auth::id())->first();
        return view('profiles.personalInfo', $data,$data1);
    }




    public function displayProfile(Request $request){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        //dd($request->id);

        $data1['particularPro']= DB::table('users')
            ->where('users.id',Auth::user()->id,'=')
            ->first();



        //dd($data1);

        return view('profiles.profile',$data1);
    }

    public function displayParticularProfile(Request $request){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }
//dd($request->all());

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        //dd($request->id);

        $data1['particularPro']= DB::table('profile_models')
            ->where('student_id',$request->id)
            ->first();



        //dd($data1);

        return view('particular_profile.particularProfile',$data1);
    }



    //image upload function

    function uploadimage($img, $path, $user_file_name = null, $width =null , $height = null)
    {
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        if (isset($user_file_name) && $user_file_name != "" && file_exists($path . $user_file_name)) {
            unlink($path . $user_file_name);
        }
        if (isset($user_file_name) && $user_file_name != "" && file_exists(path_image_thumb() . $user_file_name)) {
            unlink(path_image_thumb() . $user_file_name);
        }
// saving image in target path
        $imgName = uniqid() . '.' . $img->getClientOriginalExtension();
        $imgPath = public_path($path . $imgName);


        $img_main = \Intervention\Image\Facades\Image::make($img);
        $img_main->orientate();
        $img_main->save($path.$imgName);


        if ( file_exists($path. $imgName)) {

            /*   $newNme = public_path(path_image_thumb() . $imgName);

               if (!file_exists(path_image_thumb())) {
                  mkdir(path_image_thumb(), 0777, true);
               }
              $img = \Intervention\Image\Facades\Image::make($imgPath);
              $img->fit(200);
               $img->orientate();
               $img->save(path_image_thumb().$imgName);
   */
            return $imgName;
        }
        return false;
    }




}
