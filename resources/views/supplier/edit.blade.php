@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Edit Supplier')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('supplier.index') }}"> Back</a>
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
   
<form action="{{ route('supplier.update') }}" method="POST">
    @csrf
  
     <div class="row">
        <input type="hidden" name="id_supplier" class="form-control" value="{{$supplier->id_supplier}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Supplier:</strong>
                <input type="text" name="nama_supplier" class="form-control" value="{{$supplier->nama_supplier}}" placeholder="Nama Supplier">
            </div>
            <div class="form-group">
                <strong>Alamat:</strong>
                <textarea name="alamat" class="form-control" cols="30" rows="10">{{$supplier->alamat}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection