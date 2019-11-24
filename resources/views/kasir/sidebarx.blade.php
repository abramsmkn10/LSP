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
            <a href="{{url('kasir')}}" class="nav-link {{ Request::is('kasir') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('kasir/transaksi')}}" class="nav-link {{ Request::is('kasir/transaksi') ? 'active' : '' }}">
              <i class="nav-icon fas fa-shopping-cart"></i>
              <p>Transaksi</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('kasir/transaksi/kode_unik')}}" class="nav-link {{ Request::is('kasir/transaksi/kode_unik') ? 'active' : '' }}">
              <i class="nav-icon fas  fa-comment"></i>
              <p>Laporan Transaksi</p>
            </a>
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