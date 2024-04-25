@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Show Barang')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('barang.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                {{ $barang->nama_barang }}
            </div>
            <div class="form-group">
                <strong>Kategori:</strong>
                {{ $barang->nama_kategori }}
            </div>
            <div class="form-group">
                <strong>Supplier:</strong>
                {{ $barang->nama_supplier }}
            </div>
        </div>
    </div>
@endsection