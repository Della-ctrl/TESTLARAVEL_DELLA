@extends('templates.main')
@section('title', 'Data Pengajuan')
@section('module_name', 'Data Pengajuan')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            @if (Auth::user()->role == 'KARYAWAN')
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('pengajuan.create') }}"> Add New Data</a>
                </div>
            @endif
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id Pengajuan</th>
            <th>Nama Barang</th>
            <th>Jumlah Barang</th>
            <th>Keterangan</th>
            <th>Created By</th>
            <th>Created Date</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        <?php $i=1; ?>
        @foreach ($data as $a)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $a->id_pengajuan }}</td>
            <td>{{ $a->nama_barang }}</td>
            <td>{{ $a->jumlah }}</td>
            <td>{{ $a->keterangan }}</td>
            <td>{{ $a->created_by }}</td>
            <td>{{ $a->created_date }}</td>
            <td>{{ $a->status }}</td>
            <td>
                <form action="{{ route('pengajuan.destroy',$a->id_pengajuan) }}" method="POST">
                @if (Auth::user()->role == 'SPV')
                    <a class="btn btn-info" href="{{ route('pengajuan.approve',$a->id_pengajuan) }}">Approve</a>
                    <a class="btn btn-danger" href="{{ route('pengajuan.reject',$a->id_pengajuan) }}">Reject</a>
                @else
                    @if ($a->status == 'DIAJUKAN')
                        <a class="btn btn-info" href="{{ route('pengajuan.show',$a->id_pengajuan) }}">Show</a>
        
                        <a class="btn btn-primary" href="{{ route('pengajuan.edit',$a->id_pengajuan) }}">Edit</a>
    
                        <a class="btn btn-danger" href="{{ route('pengajuan.destroy',$a->id_pengajuan) }}">Delete</a>
                    @elseif($a->status == 'DISETUJUI')
                        <a class="btn btn-info" href="{{ route('pengajuan.print',$a->id_pengajuan) }}"> <i class="fas fa-print nav-icon"></i> Cetak</a>
                    @else
                    @endif
                @endif
                </form>
            </td>
            <?php $i++; ?>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection