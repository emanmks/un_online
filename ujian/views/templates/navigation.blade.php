<div class="sidebar-toggle-box">
    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
</div>

<a href="{{ URL::to('/') }}" class="logo"><b>UN CBT 2015 JILC</b></a>

<div class="nav notify-row" id="top_menu">
    
    <ul class="nav top-menu">
        
    </ul>
    
</div>
<div class="top-menu">
    <ul class="nav pull-right top-menu">
        <li><a class="logout" href="{{ URL::to('history') }}/{{ Auth::user()->id }}">{{ Auth::user()->username }}</a></li>
        <li><a class="logout" href="{{ URL::to('logout') }}">Logout</a></li>
    </ul>
</div>