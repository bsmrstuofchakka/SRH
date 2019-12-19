@include('layout.beforeSearchMaster')


<div class="social clear">
    <div class="searchbtn clear">
        {!! Form::open(array('url' => url('userDetails/search'), 'files' => true, 'class'=>'d-flex justify-content-between') )  !!}

        <input type="text" name="searchUD"   value="@if(!empty($searchUD)) {{$searchUD->$searchUD}} @endif" placeholder="Search keyword..."/>
        <input type="submit" name="submit" value="Search"/>
        {!! Form::close() !!}
    </div>
</div>


@include('layout.afterSearchMasterUserAdmin')

  <link href="{{asset('userDetails/css/style.css')}}" rel="stylesheet" type="text/css" />





<div class="features_area section_gap_change">

                    <span class="contact100-form-title-1">
                      Student List
                    </span>

        <div class="containerChange">
            @if(session('success'))
                {{session('success')}}
            @endif

            <div class="col-12Change2">
                <a class="primary-btn text-uppercase"  href="{{url('userDetails/add')}}">Add Student </a>
            </div>

                <div class="table-scrollable" >
                <table class="responstable" id="sample_1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Room No.</th>
                        <th>Bed No.</th>
                        <th>Department</th>
                        <th>Session</th>
                        <th>Year/Semester</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Guardian Contact Number</th>
                        <th>Blood Group</th>
                        <th>Address</th>
                        <th>Barcode</th>
                        <th>Photo</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>

                    @if(isset($userDetails[0]))
                    @foreach($userDetails as $user)

                        <tr>
                            <th>{{$user->id}}</th>
                            <th>{{$user->student_id}}</th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->roomno}}</th>
                            <th>{{$user->bedno}}</th>

                            <th>{{$user->department}}</th>
                            <th>{{$user->ses}}</th>
                            <th>{{$user->yearSem}}</th>
                            <th>{{$user->fname}}</th>
                            <th>{{$user->mname}}</th>
                            <th>{{$user->cnumber}}</th>
                            <th>{{$user->email}}</th>
                            <th>{{$user->guarcontact}}</th>
                            <th>{{$user->blood_group}}</th>
                            <th>{{$user->address}}</th>
                            <th>{{$user->bcode}}</th>
                            <th>
                                @if(!empty($user->photo))
                                    <img width="100" src="{{asset('/uploads/personalPhotos/'.$user->photo)}}"  alt="">
                                @endif

                            </th>

                            <th>
                                <a href="{{url('userDetails/edit').'?id='.$user->id}}">Edit /</a>
                                <a href="{{url('userDetails/delete').'?id='.$user->id}}">Delete</a>
                            </th>
                        </tr>

                    @endforeach
                        @endif

                </table>
            </div>
            </div>

    <div class="paginationChange">
        <li class="page-item">{{$userDetails->links()}}</li>
    </div>
</div>



@include('layout.beforePagination')


@include('layout.afterPagination')

