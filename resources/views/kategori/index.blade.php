@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Data Kategori')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kategori.create') }}"> Add New Data</a>
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
            <th>Id Kategori</th>
            <th>Nama Kategori</th>
            <th width="280px">Action</th>
        </tr>
        <?php $i=1; ?>
        @foreach ($data as $a)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $a->id_kategori }}</td>
            <td>{{ $a->nama_kategori }}</td>
            <td>
                <form action="{{ route('kategori.destroy',$a->id_kategori) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('kategori.show',$a->id_kategori) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('kategori.edit',$a->id_kategori) }}">Edit</a>
   
                    <a class="btn btn-danger" href="{{ route('kategori.destroy',$a->id_kategori) }}">Delete</a>
                </form>
            </td>
            <?php $i++; ?>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection