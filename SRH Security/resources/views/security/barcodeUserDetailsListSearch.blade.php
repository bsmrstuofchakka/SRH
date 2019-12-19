@include('layout.beforeSearchMaster')

<div class="social clear">
    <div class="searchbtn clear">

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
                                <th>{{$user->id}}</th>
                                <th>{{$user->student_id}}</th>
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

            </div>
    </div>



    </div>


@include('layout.beforePagination')

@include('layout.afterPagination')
