<!DOCTYPE html>
<html>
<head>
    <title>Pengajuan Stationary App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<div class="container">
    <div class="pull-right">
        @if(Auth::user()->role == 'ADMIN')
        <a class="btn btn-success" href="{{ route('kategori.index') }}"> Data Kategori</a>
        <a class="btn btn-success" href="{{ route('supplier.index') }}"> Data Supplier</a>
        <a class="btn btn-success" href="{{ route('barang.index') }}"> Master Barang</a>
        <a class="btn btn-success" href="{{ route('user.index') }}"> Data User</a>

        @else
        <a class="btn btn-success" href="{{ route('pengajuan.index') }}"> Pengajuan</a>

        @endif
            <a href="{{ route('logout') }}"
            class="btn btn-success"
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                >
                    <i class="fas fa-door-open nav-icon"></i>
                    <p>Logout</p>
                </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
                <input type="hidden" value="{{ Auth::user()->username }}" name="username">
            </form>
    </div>
    @yield('content')
</div>
    
</body>
</html>