<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/AdminLTELogo.png') }}" 
            alt="AdminLTE Logo" 
            class="brand-image img-circle elevation-3" style="opacity: .8"
        >
        <span class="brand-text font-weight-light">Pengajuan Stationary</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('adminlte/dist/img/avatar4.png') }}" 
            class="img-circle elevation-2" alt="User Image"
        >
        </div>
        <div class="info">
          <a href="javascript:void(0);" class="d-block">{{ ucwords(auth()->user()->name) }}</a>
        </div>
      </div>
      <!-- End Of Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" 
            data-widget="treeview" role="menu" data-accordion="false"
        >
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ url('/home') }}" 
                    class="nav-link {{ request()->segment(1) == 'home' ? 'active' : '' }}"
                >
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Home
                    </p>
                </a>
            </li>

            @if(auth()->user()->role == 'ADMIN')
            <li class="nav-item ml-0">
                <a href="{{ route('kategori.index') }}" 
                    class="nav-link {{ request()->segment(1) == 'kategori' ? 'active' : ''}}"
                >
                    <i class="fas fa-file nav-icon"></i>
                    <p>
                        Data Kategori
                    </p>
                </a>
            </li>@auth
            <li class="nav-item ml-0">
                <a href="{{ route('supplier.index') }}" 
                    class="nav-link {{ request()->segment(1) == 'supplier' ? 'active' : ''}}"
                >
                    <i class="fas fa-file nav-icon"></i>
                    <p>
                        Data Supplier
                    </p>
                </a>
            </li>
            <li class="nav-item ml-0">
                <a href="{{ route('barang.index') }}" 
                    class="nav-link {{ request()->segment(1) == 'barang' ? 'active' : ''}}"
                >
                    <i class="fas fa-file nav-icon"></i>
                    <p>
                        Master Barang
                    </p>
                </a>
            </li>
            <li class="nav-item ml-0">
                <a href="{{ route('user.index') }}" 
                    class="nav-link {{ request()->segment(1) == 'user' ? 'active' : ''}}"
                >
                    <i class="fas fa-file nav-icon"></i>
                    <p>
                        Data User
                    </p>
                </a>
            </li>
            @endauth

            @else
            <li class="nav-item ml-0">
                <a href="{{ route('pengajuan.index') }}" 
                    class="nav-link {{ request()->segment(1) == 'pengajuan' ? 'active' : ''}}"
                >
                    <i class="fas fa-file nav-icon"></i>
                    <p>
                        Data Pengajuan
                    </p>
                </a>
            </li>
            @endif

            {{-- Logout --}}
            <li class="nav-item ml-0">
                <a href="{{ route('logout') }}"
                    class="nav-link {{ request()->segment(1) == 'logout' ? 'active' : ''}}"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >
                    <i class="fas fa-door-open nav-icon"></i>
                    <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->username }}" name="username">
                </form>
            </li>
            {{-- Logout --}}
        </ul>
      </nav>
      <!-- /. end of sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
<!-- End Of Main Sidebar Container -->