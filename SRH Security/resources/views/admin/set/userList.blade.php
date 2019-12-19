@include('layout.beforeSearchMaster')

<div class="social clear">
    <div class="searchbtn clear">
        {!! Form::open(array('url' => url('users/search'), 'files' => true, 'class'=>'d-flex justify-content-between') )  !!}

        <input type="text" name="searchU"   value="@if(!empty($searchU)) {{$searchU->$searchU}} @endif" placeholder="Search keyword..."/>
        <input type="submit" name="submit" value="Search"/>
        {!! Form::close() !!}
    </div>
</div>


@include('layout.afterSearchMasterUserAdmin')





<div class="features_area section_gap_change">


    @if(session('success'))
        {{session('success')}}
    @endif


                    <span class="contact100-form-title-1">
                       User List
                    </span>

        <div class="containerChange">


            <div class="col-12Change2">
                <a class="primary-btn text-uppercase"  href="{{url('users/add')}}">Add User</a>
            </div>


                <table class="responstable">

                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>EMAIL</th>
                        <th>User Type</th>
                        <th>ACTION</th>
                    </tr>


                    @if(isset($users[0]))
                    @foreach($users as $user)

                        <tr>
                            <th>{{$user->id}}</th>
                            <th>{{$user->username}}</th>
                            <th>{{$user->email}}</th>
                            @if($user->userType==1)
                                <th>Admin</th>
                            @else
                                <th>User</th>
                            @endif

                            <th>
                                <a href="{{url('users/edit').'?id='.$user->id}}">Edit /</a>
                                <a href="{{url('users/delete').'?id='.$user->id}}">Delete</a>
                            </th>
                        </tr>

                    @endforeach
                        @endif

                </table>

            </div>
    </div>






@include('layout.beforePagination')

@include('layout.afterPagination')



