<header class="main-header">
  <!-- Logo -->
  <a href="/" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">KTM</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">Kebun Tebu Mas</span>
  </a>
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="/img/default-user.png" class="user-image" alt="User Image">
            <span class="hidden-xs">Manager</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <img src="/img/default-user.png" class="img-circle" alt="User Image">
              <p>Manager</p>
            </li>
            <li class="user-footer">
              <div class="pull-right">
                <a href="{{ url('/logout') }}" class="btn btn-default btn-flat"
                onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                    Sign out
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
