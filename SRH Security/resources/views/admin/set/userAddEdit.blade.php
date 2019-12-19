@include('layout.beforeSearchMaster')
@include('layout.SearchMaster')
@include('layout.afterSearchMasterUserAdmin')



<div class="features_area section_gap_change">


				<span class="contact100-form-title-1">
                    User Information
				</span>

        <div class="containerChange">

            @if(session('success'))
                {{session('success')}}
            @endif


            <div class="wrap-contact100">

                {!! Form::open(array('url' => url('users/save'), 'files' => true, 'class'=>'contact100-form validate-form') )  !!}


                @if(!empty($users))
                    <input type="hidden" name="id" value="{{$users->id}}">
                @endif



                <div class="wrap-input100 validate-input">
                        <span class="label-input100">Username:</span>
                        <input class="input100" type="text"  name="username"   value="@if(!empty($users)) {{$users->username}} @endif" placeholder="Please,Enter Unique Username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input">
                        <span class="label-input100">Email:</span>
                        <input class="input100" type="email" name="email"  value="@if(!empty($users)) {{$users->email}} @endif" placeholder="Please, Enter Unique email">
                        <span class="focus-input100"></span>
                    </div>

                <div class="wrap-input100 validate-input">
                    <span class="label-input100">Password:</span>
                    <input class="input100" type="password" name="password"   placeholder="Enter password">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">UserType:</span>
                    <select class="input100" type="text" name="userType"  >
                        @if(!empty($users))

                            <option @if($users->userType==1) selected @endif value=1>Admin</option>
                            <option @if($users->userType==0) selected @endif value=0>User</option>
                        @else
                            <option value="0">User</option>
                            <option value="1">Admin</option>

                        @endif
                    </select>
                    <span class="focus-input100"></span>
                </div>


                <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn1">
						<span>
							Save
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                        </button>
                    </div>

                    {!! Form::close() !!}



            </div>


        </div>



    </div>






@include('layout.beforePagination')

@include('layout.afterPagination')


