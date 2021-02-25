<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" id="setupDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-cog fa-fw"></i></a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="setupDropdown">
        <a class="dropdown-item" href="{{route('user.index')}}"><i class="fas fa-user"></i> Users</a>
        @if(!$deletedUsers == 0)<a class="dropdown-item" href="{{route('trashed.user.index')}}"><i class="fas fa-trash"></i> Deleted Users</a>@endif
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('hotel.index')}}"><i class="fas fa-hotel"></i> Hotel</a>
        @if(!$deletedHotels == 0)<a class="dropdown-item" href="{{route('trashed.hotel.index')}}"><i class="fas fa-trash"></i> Deleted Hotels</a>@endif
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{route('role.index')}}"><i class="fas fa-user-tag"></i> Role</a>
        <a class="dropdown-item" href="{{route('permission.index')}}"><i class="fas fa-tasks"></i> Permission</a>

    </div>
</li>
