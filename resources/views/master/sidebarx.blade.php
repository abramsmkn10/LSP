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
          <li class="nav-item has-treeview">
            <a href="{{url('admin')}}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li>

          <li class="nav-item has-treeview {{ Request::is('admin/laba') || Request::is('admin/stok-ppn') || Request::is('admin/produk/add' ) || Request::is('admin/laba') || Request::is('admin/kategori/add' ) || Request::is('admin/unit/add' ) || Request::is('admin/curr/add' ) || Request::is('admin/produk') ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ Request::is('admin/stok-ppn') || Request::is('admin/produk') || Request::is('admin/kategori/add' ) || Request::is('admin/unit/add' ) || Request::is('admin/curr/add' ) ? 'active' : '' }}">
              <i class="nav-icon fas fa-cube"></i>
              <p>
                Inventory
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/produk')}}" class="nav-link {{ Request::is('admin/produk') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Master Produk</p>
                </a>
              </li>
                <li class="nav-item has-treeview {{ Request::is('admin/laba') || Request::is('admin/stok-ppn') || Request::is('admin/kategori/add' ) || Request::is('admin/curr/add' ) || Request::is('admin/unit/add' ) ? 'menu-open' : '' }}">
                  <a href="#" class="nav-link {{ Request::is('admin/laba') || Request::is('admin/stok-ppn') || Request::is('admin/curr/add' ) || Request::is('admin/unit/add') || Request::is('admin/kategori/add' ) ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Master Konfig<i class="fas fa-angle-left right"></i></p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('admin/curr/add')}}" class="nav-link {{ Request::is('admin/curr/add') ? 'active' : '' }}">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Mata Uang</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/kategori/add')}}" class="nav-link {{ Request::is('admin/kategori/add') ? 'active' : '' }}">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Kategori</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/unit/add')}}" class="nav-link {{ Request::is('admin/unit/add') ? 'active' : '' }}">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Unit</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/laba')}}" class="nav-link {{ Request::is('admin/laba') ? 'active' : '' }}">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Persentase Laba</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('admin/stok-ppn')}}" class="nav-link {{ Request::is('admin/stok-ppn') ? 'active' : '' }}">
                        <i class="far fa-dot-circle nav-icon"></i>
                        <p>Stok Minimal & PPN</p>
                      </a>
                    </li>
                  </ul>
                </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('admin/masuk/all')}}" class="nav-link {{ Request::is('admin/masuk/all') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cloud-download-alt"></i>
              <p>Lap. Barang Masuk</p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('admin/keluar/all')}}" class="nav-link {{ Request::is('admin/keluar/all') ? 'active' : '' }}">
              <i class="nav-icon fas fa-cloud-download-alt"></i>
              <p>Lap. Barang Keluar</p>
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