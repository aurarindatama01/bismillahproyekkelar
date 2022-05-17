@include('partials.dashNavbar')
<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: darkblue;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="{{ asset('dash/dist/img/saloh.png') }}"
           alt="Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Sistem Ujian</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
                <img src="" class="img-circle elevation-2" alt="User Image" height="50px">
            
            
        </div>
        <div class="info">
          <a href="/Okemin/Profile" class="d-block">Super Admin</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                    <a href="{{ url('/Okemin')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                        Admin's Home
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-alt"></i>
                        <p>
                        Profile
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Superadmin/Profile/')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Superadmin/Profile/Picture')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Ubah Photo Profil</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                        Management Sekolah
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="{{ url('/Superadmin/Sekolah/List')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Management Sekolah</p>
                            </a>
                        </li>
                        
                    </ul>
                </li>

                


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
