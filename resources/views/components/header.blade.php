<div class="header">
    <div class="header-left">
        <a href="{{ route('home') }}" class="logo"> <img src="{{ asset('assets/img/logo.png') }}" width="50" height="70" alt="logo"> <span class="logoclass">AAAGROUP</span> </a>
        <a href="{{ route('home') }}" class="logo logo-small"> <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" width="30" height="30"> </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
    <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
    <ul class="nav user-menu">
        <li class="nav-item dropdown noti-dropdown" title="Tez kunda. . .">
            <a href="#" class="dropdown-toggle nav-link"> <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span> </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header"> <span class="notification-title">Xabarlar</span> <a href="javascript:void(0)" class="clear-noti"> Tozalash </a> </div>
                <div class="noti-content">
                    <ul class="notification-list">
                        <!-- <li class="notification-message">
                            <a href="#">
                                <div class="media"> <span class="avatar avatar-sm">
                                    <img class="avatar-img rounded-circle" alt="User Image" src="assets/img/profiles/avatar-02.jpg">
                                    </span>
                                    <div class="media-body">
                                        <p class="noti-details"><span class="noti-title">Carlson Tech</span> has approved <span class="noti-title">your estimate</span></p>
                                        <p class="noti-time"><span class="notification-time">4 mins ago</span> </p>
                                    </div>
                                </div>
                            </a>
                        </li> -->
                    </ul>
                </div>
                <div class="topnav-dropdown-footer"> <a href="#">View all Notifications</a> </div>
            </div>
        </li>
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="{{ asset('assets/img/user.jpeg') }}" width="31" alt="Soeng Souy"></span> </a>
            <div class="dropdown-menu">
                <div class="">
                    <div class="p-2 btn-primary">
                        <h6 class="p-2">{{ $staff->name }}</h6>
                    </div>
                </div> <a class="dropdown-item" href="{{ route('about-me') }}">Mening hisobim</a> <a class="dropdown-item" href="{{ route('logout') }}">Tizimdan chiqish</a> </div>
        </li>
    </ul>

</div>