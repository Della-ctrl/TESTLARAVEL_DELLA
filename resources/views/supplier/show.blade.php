@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Show Supplier')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('supplier.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Supplier:</strong>
                {{ $supplier->nama_supplier }}
            </div>
            <div class="form-group">
                <strong>Alamat:</strong>
                {{ $supplier->alamat }}
            </div>
        </div>
    </div>
@endsection