@include('layout.beforeSearchMaster')
@include('layout.SearchMaster')
@include('layout.afterSearchMasterUserAdmin')



<div class="features_area section_gap_change">


				<span class="contact100-form-title-1">
                  Add  Student Form
				</span>

        <div class="containerChange">
            @if(session('success'))
                {{session('success')}}
            @endif


            <div class="wrap-contact100">

                {!! Form::open(array('url' => url('userDetails/save'), 'files' => true, 'class'=>'contact100-form validate-form') )  !!}


                @if(!empty($userDetails))
                    <input type="hidden" name="id" value="{{$userDetails->id}}">
                @endif

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Student ID:</span>
                    <input class="input100" type="text" name="student_id" value="@if(!empty($userDetails)) {{$userDetails->student_id}} @endif" placeholder="Enter student id" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Name:</span>
                    <input class="input100" type="text" name="name" value="@if(!empty($userDetails)) {{$userDetails->name}} @endif" placeholder="Enter name">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Room No:</span>
                    <input class="input100" type="text" name="roomno" value="@if(!empty($userDetails)) {{$userDetails->roomno}} @endif" placeholder="Enter room no" required>
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Bed No:</span>
                    <input class="input100" type="text" name="bedno" value="@if(!empty($userDetails)) {{$userDetails->bedno}} @endif" placeholder="Enter bed no">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Department:</span>
                    <input class="input100" type="text" name="department" value="@if(!empty($userDetails)) {{$userDetails->department}} @endif" placeholder="Enter department">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Session:</span>
                    <input class="input100" type="text" name="ses" value="@if(!empty($userDetails)) {{$userDetails->ses}} @endif" placeholder="Enter session">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Year/Sem:</span>
                    <input class="input100" type="text" name="yearSem" value="@if(!empty($userDetails)) {{$userDetails->yearSem}} @endif" placeholder="Enter Year/Semester">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Father Name:</span>
                    <input class="input100" type="text" name="fname" value="@if(!empty($userDetails)) {{$userDetails->fname}} @endif" placeholder="Enter father name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Mother Name:</span>
                    <input class="input100" type="text" name="mname" value="@if(!empty($userDetails)) {{$userDetails->mname}} @endif" placeholder="Enter mother name">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Contact Number:</span>
                    <input class="input100" type="text" name="cnumber" value="@if(!empty($userDetails)) {{$userDetails->cnumber}} @endif" placeholder="Enter contact number">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Email:</span>
                    <input class="input100" type="email" name="email" value="@if(!empty($userDetails)) {{$userDetails->email}} @endif" placeholder="Enter email">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Guardian Contact Number:</span>
                    <input class="input100" type="text" name="guarcontact" value="@if(!empty($userDetails)) {{$userDetails->guarcontact}} @endif" placeholder="Enter guardian contact number">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Blood Group:</span>
                    <input class="input100" type="text" name="blood_group" value="@if(!empty($userDetails)) {{$userDetails->blood_group}} @endif" placeholder="Enter blood group">
                    <span class="focus-input100"></span>
                </div>
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Address:</span>
                    <input class="input100" type="text" name="address" value="@if(!empty($userDetails)) {{$userDetails->address}} @endif" placeholder="Enter address">
                    <span class="focus-input100"></span>
                </div>





                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Barcode:</span>
                    <input class="input100" type="text" name="bcode" value="@if(!empty($userDetails)) {{$userDetails->bcode}} @endif" placeholder="Enter barcode">
                    <span class="focus-input100"></span>
                </div>





                <!-- $contents = pathinfo(storage_path().'/zOEh8zefUuHmOhlLY80UNNneTO5tJmv1ECfrwOpF.png');
                // img width="100px" src="asset('admin/uploads/'.$flower-image)}}

                //  dd( $contents['extension']);
                -->
                <div class="wrap-input100 validate-input" >
                    <span class="label-input100">Photo:</span>
                    <input class="input100" type="file" name="photo"  placeholder="Enter photo">

                    @if(!empty($userDetails->photo))
                        <img width="80" src="{{asset('/uploads/personalPhotos/'.$userDetails->photo)}}"  alt="">
                    @endif

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

<script src="{{asset('https://code.jquery.com/jquery-1.12.4.js')}}"></script>
<script src="{{asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js')}}"></script>
<script>
    $( function() {
        $('.date').datepicker();
    });
</script>