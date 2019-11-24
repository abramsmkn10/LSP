  <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('/dist/img/user8-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Abdur Rahman</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-header">Navigation</li>
          <li class="nav-item">
            <a href="{{url('superadmin')}}" class="nav-link {{ Request::is('superadmin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('superadmin/pengguna')}}" class="nav-link {{ Request::is('superadmin/pengguna') ? 'active' : '' }}">
              <i class="nav-icon fas fa-users"></i>
              <p>Pengguna</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('superadmin/brand/add')}}" class="nav-link {{ Request::is('superadmin/brand/add') ? 'active' : '' }}">
              <i class="nav-icon fas fa-flag"></i>
              <p>Brand</p>
            </a>
          </li>
          <li class="nav-item has-treeview {{ Request::is('superadmin/masuk/add')  || Request::is('superadmin/keluar/all') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('superadmin/masuk/add')  || Request::is('superadmin/keluar/all') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('superadmin/masuk/add')}}" class="nav-link {{ Request::is('superadmin/masuk/add') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('superadmin/keluar/all')}}" class="nav-link {{ Request::is('superadmin/keluar/all') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Keluar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-angle-left"></i>
              <p>
                Log Out
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>