<div style="display: flex;">
    <div class="navbar-header">
        <a href="/" class="navbar-brand">
              <span class="logo">
                <img src="https://blackhansa.de/images/blackhansa-logo.png" alt="" height="25" width="180px;">
              </span>
        </a>
    </div>

    <div class="navbar-collapse nav-responsive-disabled">
        <ul class="nav navbar-nav-1">
            <li>
                <a class="toggle-btn" onclick="toggleSidebar()">
                    <i class="fa fa-bars"></i>
                </a>
            </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown dropdown-usermenu">
                <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <div class="user-avatar">
                      <img src="https://coderthemes.com/greeva/horizontal/default/assets/images/users/avatar-1.jpg">
                    </div>
                    <span class="hidden-sm hidden-xs" style="text-transform: capitalize;"></span>
                    <span class="caret hidden-sm hidden-xs"></span>
                </a> -->

                <div class="header__topbar-user dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                    <span class="header__topbar-welcome hidden-mobile">Hi,</span>
                    @if (Auth::check())
                        <span class="header__topbar-username hidden-mobile">{{ Auth::user()->name }}</span>
                    @else
                        <span class="header__topbar-username hidden-mobile">User Name</span>
                    @endif
                    <!-- <img class="hidden" alt="Pic" src="./assets/media/users/300_25.jpg"> -->
                    <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                    <span class="badge badge--username badge--unified-success badge--lg badge--rounded badge--bold">D</span>
                </div>

                <ul class="dropdown-menu dropdown-menu-usermenu pull-right">
                    <li class="hide">
                        <a href="#">
                            <i class="fas fa-user"></i>
                            Profile
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>