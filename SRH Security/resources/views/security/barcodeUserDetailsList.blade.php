@include('layout.beforeSearchMaster')


<div class="social clear">
    <div class="searchbtn clear">
        {!! Form::open(array('url' => url('barcodeUDetails/search'), 'files' => true, 'class'=>'d-flex justify-content-between') )  !!}

        <input type="text" name="searchBD"   value="@if(!empty($searchBD)) {{$searchBD->$searchUD}} @endif" placeholder="Search keyword..."/>
        <input type="submit" name="submit" value="Search"/>
        {!! Form::close() !!}
    </div>
</div>


@include('layout.afterSearchMasterUserAdmin')

  <link href="{{asset('userDetails/css/style.css')}}" rel="stylesheet" type="text/css" />





<div class="features_area section_gap_change">

                    <span class="contact100-form-title-1">
                       User Details List based on Barcode
                    </span>

        <div class="containerChange">

                <div class="table-scrollable" >
                <table class="responstable" id="sample_1">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Student ID</th>
                        <th>Name</th>
                        <th>Check Status</th>
                        <th>Time</th>
                        <th>Department</th>
                        <th>Contact Number</th>
                        <th>Room No.</th>
                        <th>ACTION</th>
                    </tr>
                    </thead>

                    @if(isset($barcodeUDetails[0]))
                    @foreach($barcodeUDetails as $user)

                        <tr>
                            <th><a href="{{url('particularProfile').'?id='.$user->student_id}}">{{$user->id}}   </a></th>
                            <th><a href="{{url('particularProfile').'?id='.$user->student_id}}">{{$user->student_id}}   </a> </th>
                            <th>{{$user->name}}</th>
                            <th>{{$user->checkin_type}}</th>

                            <th>{{$user->currentDate}}</th>

                            <th>{{$user->department}}</th>
                            <th>{{$user->cnumber}}</th>
                            <th>{{$user->roomno}}</th>


                            <th>
                                <a href="{{url('barcodeUDetails/delete').'?id='.$user->id}}">Delete</a>
                            </th>
                        </tr>

                    @endforeach
                        @endif

                </table>
            </div>
            <div class="paginationChange">
                <li class="page-item">{{$barcodeUDetails->links()}}</li>
            </div>
            </div>
</div>



@include('layout.beforePagination')

@include('layout.afterPagination')

