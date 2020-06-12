<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('owner.dashboard') }}">
        <i class="fas fa-fw fa-home"></i>
        <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('owner.myHotel',['id' => Session::get('idSession')]) }}">
        <i class="fas fa-comment-dots"></i>
        <span>My Hotel</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('owner.information', ['id' =>  Session::get('idSession')]) }}">
        <i class="fas fa-user-circle"></i>
        <span>My Information</span></a>
    </li>
</ul>
