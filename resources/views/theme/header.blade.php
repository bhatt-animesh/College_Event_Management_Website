<!--**********************************
    Nav header start
***********************************-->
<div class="nav-header">
    <div class="brand-logo">
        <a href="#">
            <!-- <b class="logo-abbr"><img src="{!! asset('public/assets/images/logo.png') !!}" alt=""> </b>
            <span class="logo-compact"><img src="{!! asset('public/assets/images/logo-compact.png') !!}" alt=""></span> -->
            <span class="brand-title" style="color: #fff;">
            <?php if(Auth::user()->type == 1): echo "Admin Pannel";elseif(Auth::user()->type == 3): echo "Coadmin Pannel";elseif(Auth::user()->type == 4 && Auth::user()->profile_image == 'hod'): echo "HOD Pannel";elseif(Auth::user()->type == 4 && Auth::user()->profile_image == 'proctor'): echo "Proctor Pannel"; endif?>
                 <!-- <img src="{!! asset('public/front/images/logo.jpg') !!}" width="190px;">-->
            </span>
        </a>
    </div>
</div>
<!--**********************************
    Nav header end
***********************************-->

<!--**********************************
    Header start
***********************************-->
<div class="header">
    <div class="header-content clearfix">

        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{!! asset('public/assets/images/logo.png') !!}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li><a href="javascript:void(0);" data-toggle="modal" data-target="#ChangePasswordModal"><i class="icon-key"></i> <span>Change Password</span></a></li>
                                <li><a href="{{URL::to('/admin/logout')}}"><i class="icon-logout"></i> <span>Logout</span></a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!--**********************************
    Header end ti-comment-alt
***********************************-->