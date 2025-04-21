<div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="{{route('dashboard.index')}}" class="logo">
              <img
                src="{{asset('templates/assets/img/kaiadmin/logo_light.svg')}}"
                alt="navbar brand"
                class="navbar-brand"
                height="20"
              />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item">
                <a href="{{route('dashboard.index')}}">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#produk">
                  <i class="fas fa-layer-group"></i>
                  <p>Produk</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="produk">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('produk.index')}}">
                        <span class="sub-item">Tabel Produk</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('produk.form-create')}}">
                        <span class="sub-item">Tambah Produk</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pesanan">
                  <i class="fas fa-th-list"></i>
                  <p>Pesanan</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="pesanan">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('pesanan.index')}}">
                        <span class="sub-item">Tabel Pesanan</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('pesanan.form-create')}}">
                        <span class="sub-item">Tambah Pesanan</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pengguna">
                  <i class="fas fa-pen-square"></i>
                  <p>Pengguna</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="pengguna">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="{{route('user.index')}}">
                        <span class="sub-item">Tabel Pengguna</span>
                      </a>
                    </li>
                    <li>
                      <a href="{{route('user.form-create')}}">
                        <span class="sub-item">Tambah Pengguna</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
