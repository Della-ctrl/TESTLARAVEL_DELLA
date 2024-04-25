@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Master Barang')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('barang.create') }}"> Add New Data</a>
            </div>
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
            <th>Id Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Supplier</th>
            <th width="280px">Action</th>
        </tr>
        <?php $i=1; ?>
        @foreach ($data as $a)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $a->id_barang }}</td>
            <td>{{ $a->nama_barang }}</td>
            <td>{{ $a->nama_kategori }}</td>
            <td>{{ $a->nama_supplier }}</td>
            <td>
                <form action="{{ route('barang.destroy',$a->id_barang) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('barang.show',$a->id_barang) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('barang.edit',$a->id_barang) }}">Edit</a>
   
                    <a class="btn btn-danger" href="{{ route('barang.destroy',$a->id_barang) }}">Delete</a>
                </form>
            </td>
            <?php $i++; ?>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection