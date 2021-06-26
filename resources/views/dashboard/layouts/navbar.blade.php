<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('index')}}" class="nav-link ">
                <i class="far fa-circle nav-icon"></i>
                <p>index</p>
            </a>
        </li>
        <li class="nav-item  {{Route::is('admins*')?'menu-open ':''}}">
            <a href="#" class="nav-link {{Route::is('admins*')?' active':''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     admins
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('admins.index')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>all admins</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admins.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>create new admin</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  {{Route::is('cities*')?'menu-open ':''}}">
            <a href="#" class="nav-link {{Route::is('cities*')?' active':''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     cities
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('cities.index')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>all cities</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cities.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>create new city</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  {{Route::is('lines*')?'menu-open ':''}}">
            <a href="#" class="nav-link {{Route::is('lines*')?' active':''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     lines
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('lines.index')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>all lines</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('lines.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>create new line</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  {{Route::is('users*')?'menu-open ':''}}">
            <a href="#" class="nav-link {{Route::is('users*')?' active':''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     users
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>all users</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('users.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>create new user</p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item  {{Route::is('buses*')?'menu-open ':''}}">
            <a href="#" class="nav-link {{Route::is('users*')?' active':''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     buses
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('buses.index')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>all buses</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('buses.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>create new bus</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  {{Route::is('trips*')?'menu-open ':''}}">
            <a href="#" class="nav-link {{Route::is('trips*')?' active':''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     trips
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('trips.index')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>all trips</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('trips.create')}}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>create new bus</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item  {{Route::is('reservations*')?'menu-open ':''}}">
            <a href="#" class="nav-link {{Route::is('users*')?' active':''}} ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                     reservations
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{route('reservations.index')}}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>all reservations</p>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</nav>
