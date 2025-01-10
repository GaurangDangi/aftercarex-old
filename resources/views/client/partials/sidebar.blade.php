<div class="pcoded-inner-navbar main-menu">
    <div class="">
        <div class="main-menu-header">
            <img class="img-80 img-radius" src="{{asset('client/assets/images/user.jpg')}}" alt="User-Profile-Image">
            <div class="user-details">
                <span id="more-details">{{ $client->name }}</span>
            </div>
        </div>
    </div>
    <div class="pcoded-navigation-label"></div>
    @php $segment =  Request::segment(2); @endphp
    <ul class="pcoded-item pcoded-left-item">
        <li class="{{ ($segment=='dashboard')?'active':'' }}">
            <a href="{{ route('client.dashboard') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext">Dashboard</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        {{-- <li class="">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext">Aftercare Ally</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li> --}}
        <li class="{{ ($segment=='resource-library')?'active':'' }}">
            <a href="{{ route('client.ResourceLibrary') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext">Resource Library</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="{{ ($segment=='milestone')?'active':'' }}">
            <a href="{{ route('client.milestone') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext">My Milestones</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="{{ ($segment=='live-group-classes')?'active':'' }}">
            <a href="{{ route('client.liveGroupClasses') }}" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext">Live Group Classes</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
        <li class="">
            <a href="#" class="waves-effect waves-dark">
                <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                <span class="pcoded-mtext">Pathway Partner <br/> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Application</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>
    </ul>
</div>