<?php

namespace App\Http\Controllers;
use App\ProfileModel;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Validator;

class UserController extends Controller
{


    public function addUser(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();



        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        return view('admin.set.userAddEdit',$data1);
    }

    public function listUser(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }


        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        $data['users']=User::all();

        return view('admin.set.userList', $data,$data1);
    }

    /*  public function addUser(){
          return view('admin.set.userAddEdit');
      } */

    public function saveUser(Request $request){

//dd($request->all());
        $data = new User();
        if(isset($request->id) &&!empty($request->id)){
            $data = User::find($request->id);


            if($data->email!=$request->email){
                $validator = \Validator::make($request->all(), [
                    'email' => 'required|email|max:20|unique:users,email',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('success','Unsuccessful,Please try again');
                }
            }
            if($data->username!=$request->username){
                $validator = \Validator::make($request->all(), [
                    'username' => 'required|string|max:10|unique:users,username',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('success','Unsuccessful,Please try again');
                }
            }
        }

        else{
            $validator = \Validator::make($request->all(), [
                'email' => 'required|email|max:20|unique:users,email',
                'username' => 'required|string|max:10|unique:users,username',

            ]);
           // dd($validator->fails());
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with('success','Unsuccessful,Please try again');
            }
        }

//dd('djjdjd');
        //dd($data);
        //dd($request->all());


//dd($data);
        $data->username=$request->username;
        $data->email=$request->email;



        if(!empty($request->password))
        $data->password=bcrypt($request->password);
        $data->userType= $request->userType;
        //dd($data);
        if($data->save()==true) {
            return redirect('users')->with('success','Successfully Saved');
        }
        else{
            return redirect('users/add')->with('success','Unsuccessful,Please try again');

        }





        //return redirect('users');
    }

    public function deleteUser(Request $request){
        User::find($request->id)->delete();
        return redirect()->back();
    }

    public function editUser(Request $request){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        $data['users'] = User::find($request->id);


        return view('admin.set.userAddEdit',$data,$data1);
    }

    public function listUserSearch(Request $request)
    {
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        //dd($request->searchU);
        $search = $request->searchU;
        // $date = $request->input('date');
        if($search==null)
            $data['users'] =null;

        if (isset($search) && !empty($search)) {
            $data['users'] = DB::table('users')
                ->where('id', 'like binary', '%' . $search . '%')
                ->orwhere('username', 'like binary', 'like', '%' . $search . '%')
                ->orWhere('email', 'like binary', '%' . $search . '%')
                ->orWhere('userType', 'like binary', '%' . $search . '%')
                ->get();
        }


        return view('admin.set.userListSearch', $data,$data1);
    }
    public function listUserDetailsSearch(Request $request)
    {
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        //dd($request->searchUD);
        $search = $request->searchUD;
        // $date = $request->input('date');

        if($search==null)
            $data['userDetails'] =null;

        if (isset($search) && !empty($search)) {
            $data['userDetails'] = DB::table('profile_models')
                ->where('id', 'like binary', '%' . $search . '%')
                ->orwhere('student_id', 'like binary', '%' . $search . '%')
                ->orwhere('name', 'like binary', '%' . $search . '%')
                ->orwhere('fname', 'like binary', '%' . $search . '%')
                ->orwhere('mname', 'like binary', '%' . $search . '%')
                ->orwhere('address', 'like binary', '%' . $search . '%')
                ->orWhere('department', 'like binary', '%' . $search . '%')
                ->orWhere('bedno', 'like binary', '%' . $search . '%')
                ->orWhere('cnumber', 'like binary', '%' . $search . '%')
                ->orWhere('roomno', 'like binary', '%' . $search . '%')
                ->orWhere('ses', 'like binary', '%' . $search . '%')
                ->orWhere('yearSem', 'like binary', '%' . $search . '%')
                ->orWhere('email', 'like binary', '%' . $search . '%')
                ->orWhere('guarcontact', 'like binary', '%' . $search . '%')
                ->orWhere('bcode', 'like binary', '%' . $search . '%')
                ->orWhere('blood_group', 'like binary', '%' . $search . '%')
                ->get();
        }


        return view('admin.set.userDetailsListSearch', $data,$data1);
    }






    public function addUserDetails(){
        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();



        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();
        return view('admin.set.userDetailsAddEdit',$data1);
    }

    public function listUserDetails(){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }

        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        $data['userDetails']=DB::table('profile_models')
            ->paginate(15);

        return view('admin.set.userDetailsList', $data,$data1);
    }

    /*  public function addUser(){
          return view('admin.set.userAddEdit');
      } */

    public function saveUserDetails(Request $request){
        $data = new ProfileModel();

        if(isset($request->id) &&!empty($request->id)){
            $data = ProfileModel::find($request->id);

            if($data->student_id!=$request->student_id) {
                $validator = \Validator::make($request->all(), [
                    'student_id' => 'required|string|max:20|unique:profile_models,student_id',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('success','Unsuccessful,Please try again');
                }
            }

            if($data->bcode!=$request->bcode) {
                $validator = \Validator::make($request->all(), [
                    'bcode' => 'required|string|max:20|unique:profile_models,bcode',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('success','Unsuccessful,Please try again');
                }
            }
            if($data->email!=$request->email) {
                $validator = \Validator::make($request->all(), [
                    'email' => 'required|string|max:20|unique:profile_models,email',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('success','Unsuccessful,Please try again');
                }
            }

            if($data->cnumber!=$request->cnumber) {
                $validator = \Validator::make($request->all(), [
                    'cnumber' => 'required|string|max:15|unique:profile_models,cnumber',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('success','Unsuccessful,Please try again');
                }
            }

            if($data->guarcontact!=$request->guarcontact) {
                $validator = \Validator::make($request->all(), [
                    'guarcontact' => 'required|string|max:15|unique:profile_models,guarcontact',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput()->with('success','Unsuccessful,Please try again');
                }
            }
        }
        else{
            $validator = \Validator::make($request->all(), [
                'student_id' => 'required|string|max:20|unique:profile_models,student_id',
                'cnumber' => 'required|string|max:15|unique:profile_models,cnumber',
                'guarcontact' => 'required|string|max:15|unique:profile_models,guarcontact',
                'email' => 'required|string|max:25|unique:profile_models,email',
                'bcode' => 'required|string|max:25|unique:profile_models,bcode',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput()->with('success','Unsuccessful,Please try again');
            }
        }




        $data->student_id = $request->student_id;
        $data->name = $request->name;
        $data->roomno = $request->roomno;
        $data->bedno = $request->bedno;
        $data->department = $request->department;
        $data->ses = $request->ses;
        $data->yearSem = $request->yearSem;
        $data->fname = $request->fname;
        $data->mname = $request->mname;

        $data->cnumber = $request->cnumber;
        $data->email = $request->email;
        $data->guarcontact = $request->guarcontact;
        $data->blood_group = $request->blood_group;
        $data->address = $request->address;
        $data->bcode = $request->bcode;
        //  $data->nphoto= $request->nphoto;
        //        $data->photo= Storage::put('/Photos', $request->file('photo'));
        //$data->nphoto=Storage::put('/Nominee Photos', $request->file('nphoto'));



        if(!empty($request->file('photo')))
            $data->photo= $this->uploadimage($request->file('photo'),'uploads/personalPhotos/','','','');

        if($data->save()==true) {
            return redirect('uDetails')->with('success','Successfully Saved');
        }
        else{
            return redirect('userDetails/add')->with('success','Unsuccessful,Please try again');

        }

    }

    public function deleteUserDetails(Request $request){
        ProfileModel::find($request->id)->delete();
        return redirect()->back();
    }

    public function editUserDetails(Request $request){

        if(empty(Auth::user()->id)) {
            return redirect('/');
        }


        $userId=Auth::user()->id;
        $data1['userTable']= DB::table('users')
            ->where('users.id','=',$userId)
            ->first();

        $data['userDetails'] = ProfileModel::find($request->id);




        return view('admin.set.userDetailsAddEdit',$data,$data1);
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
