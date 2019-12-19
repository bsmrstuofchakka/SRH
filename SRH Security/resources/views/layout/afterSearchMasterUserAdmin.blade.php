<ul class="header-account dropdown default-dropdown" xmlns:color="http://www.w3.org/1999/xhtml">

    @if (Auth::guest())
        <div class="login"><a href="login"> <span>Login <i class="icon-calendar3"></i></span></a>
            /<a href="register"> <span>Join <i class="icon-calendar3"></i></span></a>
        </div>
    @else
        <div class="login" role="button" data-toggle="dropdown" aria-expanded="true">

            <strong class="text-lowercase">{{ Auth::user()->username }} </strong>
        </div>


        <ul class="custom-menu">
            <li><a href="{{ route('logout') }}"><i class="fa fa-unlock-alt"></i> Logout</a></li>
        </ul>
    @endif
</ul>
<!-- /Account -->








</div>

<div class="row justify-content-colter">
    <div class="col-lg-2 col-md-3 col-12 menu_block">



        <!--main menu -->
        <div class="side_menu_section">
            <ul class="menu_navCocoon">

                <li class="active" >
                    <a  href="{{asset('/adminUser')}}">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{url('profileDisplay')}}">
                        Profiles
                    </a>
                </li>

                <li>

                    <a href="{{url('passwordChange')}}">
                        Password Change
                    </a>
                </li>
                @if($userTable->userType==1)
                    <li>


                        <a href="{{url('/uDetails')}}">
                            Student List
                        </a>


                    </li>
                @endif

                @if($userTable->userType==1)
                <li>


                    <a href="{{url('/users')}}">
                        UsersList
                    </a>


                </li>
                @endif
                <li>
                    <a href="{{url('/checkin')}}">Check IN</a>
                </li>

                @if($userTable->userType==1)
                <li>


                        <a href="{{url('/barcodeUDetails')}}">
                             Check In and Out Info
                        </a>


                </li>
                @endif

                <!--    <li>
                        if($userTable->userType==1)

                            <a href="url('')}}">
                                UsersList
                            </a>

                        endif
                    </li>
                    <li>
                        if($userTable->userType==1)

                            <a href="{url('')}}">
                                Folder
                            </a>

                        endif
                    </li>
                    -->

            </ul>
        </div>
        <!--main menu end -->


    </div>
    <script>

        $('.li').on('click','li', function(){
            $(this).addClass('active').siblings().removeClass('active');
        });
    </script>