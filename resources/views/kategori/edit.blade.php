@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Edit Kategori')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('kategori.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('kategori.update') }}" method="POST">
    @csrf
  
     <div class="row">
        <input type="hidden" name="id_kategori" class="form-control" value="{{$kategori->id_kategori}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Kategori:</strong>
                <input type="text" name="nama_kategori" class="form-control" value="{{$kategori->nama_kategori}}" placeholder="Nama Kategori">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection