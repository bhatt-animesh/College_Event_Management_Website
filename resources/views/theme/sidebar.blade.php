<!--**********************************
    Sidebar start
***********************************-->
@if($auth_user_d->type == 1)
    <div class="nk-sidebar">           
        <div class="nk-nav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label">Dashboard</li>
                <li>
                    <a href="{{URL::to('/admin/home')}}" aria-expanded="false">
                        <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/category')}}" aria-expanded="false">
                        <i class="icon-menu menu-icon"></i><span class="nav-text">Event Category</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/events')}}" aria-expanded="false">
                        <i class="fa fa-plus"></i><span class="nav-text">Events</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/Gallery')}}" aria-expanded="false">
                        <i class="fa fa-plus"></i><span class="nav-text">Gallery</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/users')}}" aria-expanded="false">
                        <i class="fa fa-users"></i><span class="nav-text">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/drs')}}" aria-expanded="false">
                        <i class="fa fa-users"></i><span class="nav-text">DRS list</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/results')}}" aria-expanded="false">
                        <i class="fa fa-list-alt"></i><span class="nav-text">Results</span>
                    </a>
                </li>
                <li>
                    <a href="{{URL::to('/admin/ourteam')}}" aria-expanded="false">
                        <i class="fa fa-user-circle"></i><span class="nav-text">Our Team</span>
                    </a>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fa fa-star"></i><span class="nav-text">Participants List</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{URL::to('/admin/pralist')}}">Privacy Policy</a></li>
                        <li><a href="{{URL::to('/admin/termscondition')}}">Terms & Condition</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="icon-note menu-icon"></i><span class="nav-text">CMS Pages</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{URL::to('/admin/privacypolicy')}}">Privacy Policy</a></li>
                        <li><a href="{{URL::to('/admin/termscondition')}}">Terms & Condition</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
@elseif($auth_user_d->type == 3)
    <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a href="{{URL::to('/admin/home')}}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL::to('/admin/category')}}" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Event Category</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{URL::to('/admin/events')}}" aria-expanded="false">
                            <i class="fa fa-plus"></i><span class="nav-text">Events</span>
                        </a>
                    </li>    
                </ul>
            </div>
        </div>
@elseif($auth_user_d->type == 4 && $auth_user_d->profile_image == 'hod')    
    <div class="nk-sidebar">           
                <div class="nk-nav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label">Dashboard</li>
                        <li>
                            <a href="{{URL::to('/admin/home')}}" aria-expanded="false">
                                <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{URL::to('/admin/hodreg')}}" aria-expanded="false">
                                <i class="icon-menu menu-icon"></i><span class="nav-text">Register Team</span>
                            </a>
                        </li>  
                    </ul>
                </div>
    </div>  
    @elseif($auth_user_d->type == 4 && $auth_user_d->profile_image == 'proctor') 
    <div class="nk-sidebar">           
                    <div class="nk-nav-scroll">
                        <ul class="metismenu" id="menu">
                            <li class="nav-label">Dashboard</li>
                            <li>
                                <a href="{{URL::to('/admin/home')}}" aria-expanded="false">
                                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                    </div>
        </div>  
@endif         
<!--**********************************
    Sidebar end
***********************************-->