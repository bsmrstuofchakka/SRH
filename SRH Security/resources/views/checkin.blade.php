




@include('layout.beforeSearchMaster')

<div class="social clear">
    <div class="searchbtn clear">

    </div>
</div>




@include('layout.afterSearchMasterUserAdmin')






<div class="contentsection contemplete clear">
    <div class="maincontent clear features_area section_gap_change" >
        <div style="text-align: center">
            <h2>Scan Barcode</h2>
        </div>
        <br>
        <br>

        {!! Form::open(array('url' => url('/add_checkin'), 'files' => true))!!}
        <div class="form-group">
            <h4 style="color:red" id="success">
            @if(session('message'))
                {{session('message')}}
            @endif
            </h4>
        <div style="text-align: center">
            <label style="font-size: large">IN</label>
            <input class="check_in_type" type="radio" checked name="checkin_type" value="Check In">
            <label style="margin-left: 30px;font-size: large">OUT</label>
            <input class="check_in_type"  type="radio" name="checkin_type" value="Check Out">
            <h2 id="message">Check In Selected</h2>

        </div>
            <div style="margin-left: 32%;margin-top: 10%">
                <label>Barcode:</label>
                <input id="barcode" name="barcode" class="form-control" type="text">
            </div>
        <div>
            <button hidden id="check_in_button" type="submit" name="request_for_add_checkin" class="btn btn-primary">Submit</button>
        </div>
        </div>

        {!! Form::close() !!}
    </div>


</div>
















@include('layout.beforePagination')
@include('layout.afterPagination')

<script src="{{asset('/js/checkin.js')}}"></script>