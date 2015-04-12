<!-- **********************************************************************************************************************************************************
MAIN SIDEBAR MENU
*********************************************************************************************************************************************************** -->
<!--sidebar start-->
<div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
    
        <p class="centered"><a href="{{ URL::to('/') }}"><img src="{{ URL::to('assets/img/online.png') }}" class="img-polaroid" width="64"></a></p>
        <h5 class="centered">UN CBT 2015</h5>
          
        <li class="mt">
            @if($menu == 'dashboard')
                <a class="active" href="{{ URL::to('/') }}">
            @else
                <a href="{{ URL::to('/') }}">
            @endif
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="mt">
            @if($menu == 'subject')
                <a class="active" href="{{ URL::to('subject') }}">
            @else
                <a href="{{ URL::to('subject') }}">
            @endif
                <i class="fa fa-book"></i>
                <span>Bidang Studi</span>
            </a>
        </li>

        <li class="mt">
            @if($menu == 'package')
                <a class="active" href="{{ URL::to('package') }}">
            @else
                <a href="{{ URL::to('package') }}">
            @endif
                <i class="fa fa-archive"></i>
                <span>Paket Soal</span>
            </a>
        </li>

        <li class="mt">
            @if($menu == 'login')
                <a class="active" href="{{ URL::to('login') }}">
            @else
                <a href="{{ URL::to('login') }}">
            @endif
                <i class="fa fa-sign-in"></i>
                <span>Login</span>
            </a>
        </li>

        <li class="mt">
            @if($menu == 'examination')
                <a class="active" href="{{ URL::to('examination') }}">
            @else
                <a href="{{ URL::to('examination') }}">
            @endif
                <i class="fa fa-edit"></i>
                <span>Ujian</span>
            </a>
        </li>

    </ul>
    <!-- sidebar menu end-->
</div>
<!--sidebar end-->