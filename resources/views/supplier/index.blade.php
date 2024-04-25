@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Data Supplier')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('supplier.create') }}"> Add New Data</a>
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
            <th>Id Supplier</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th width="280px">Action</th>
        </tr>
        <?php $i=1; ?>
        @foreach ($data as $a)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $a->id_supplier }}</td>
            <td>{{ $a->nama_supplier }}</td>
            <td>{{ $a->alamat }}</td>
            <td>
                <form action="{{ route('supplier.destroy',$a->id_supplier) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('supplier.show',$a->id_supplier) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('supplier.edit',$a->id_supplier) }}">Edit</a>
   
                    <a class="btn btn-danger" href="{{ route('supplier.destroy',$a->id_supplier) }}">Delete</a>
                </form>
            </td>
            <?php $i++; ?>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection