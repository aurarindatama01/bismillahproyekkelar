<aside class="main-sidebar sidebar=dark-primary elevation-4" style="background-color: darkblue;">
    <!-- Brand Logo -->
    <div class="sidebarcontoh" style="background-color: darkblue; ">
    <a href="#" class="brand-link" style="box-shadow: 2px 2px 2px rgba(0,0,0,0.8);">
      <img src="{{ asset('dash/dist/img/saloh.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8; ">
      <span class="brand-text font-weight-primary" style="color: white; " >SMPN 1 Lohbener</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex" >
        <div class="image">
            @if($user->avatar)
                <img src="/storage/avatars/{{ $user->avatar }}" class="img-circle elevation-2" alt="User Image">
            @else
                <img src="{{ asset('/storage/avatars/defaultAvatar.png') }}" class="img-circle elevation-2" alt="User Image">
            @endif
        </div>
        <div class="info">
          <a href="/Student/Profile" class="d-block text-black" style="color: white;">{{ $user->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false" style="color: white;">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item" style="color: white;">
                    <a href="{{ url('/Student')}}" class="nav-link">
                        <i class="nav-icon fas fa-th" style="color: white;"></i>
                        <p style="color: white;">
                        Student's Home
                        </p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user-alt" style="color: white;"></i>
                        <p style="color: white;">
                        Profile
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Student/Profile/')}}" class="nav-link">
                                <i class="far fa-circle nav-icon" style="color: white;"></i>
                                <p style="color: white;">Profile</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Student/Profile/Picture')}}" class="nav-link">
                                <i class="far fa-circle nav-icon" style="color: white;"></i>
                                <p style="color: white;">Ubah Photo Profil</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt" style="color: white;"></i>
                        <p style="color: white;">
                        Materi
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Student/Materi/Mapel')}}" class="nav-link">
                                <i class="far fa-circle nav-icon" style="color: white;"></i>
                                <p style="color: white;">Lihat Materi</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt" style="color: white;"></i>
                        <p style="color: white;">
                        Tugas
                        <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Student/Tugas/Mapel')}}" class="nav-link">
                                <i class="far fa-circle nav-icon" style="color: white;"></i>
                                <p style="color: white;">Lihat Tugas</p>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Student/Tugas/Jawaban/List')}}" class="nav-link">
                                <i class="far fa-circle nav-icon" style="color: white;"></i>
                                <p style="color: white;">Lihat Jawaban</p>
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

