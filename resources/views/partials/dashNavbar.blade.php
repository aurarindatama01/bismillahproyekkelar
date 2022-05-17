<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: darkblue;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item" style="color: white;">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars" style="color: white;"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" style="color: white;" href="#"
          onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <i class="fas fa-sign-out-alt"></i>
          Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
