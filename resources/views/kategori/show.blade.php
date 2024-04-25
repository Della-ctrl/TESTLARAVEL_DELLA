@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Show Kategori')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('kategori.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama kategori:</strong>
                {{ $kategori->nama_kategori }}
            </div>
        </div>
    </div>
@endsection