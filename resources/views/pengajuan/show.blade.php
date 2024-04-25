@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Show Pengajuan')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pengajuan.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                {{ $pengajuan->nama_barang }}
            </div>
            <div class="form-group">
                <strong>Keterangan:</strong>
                {{ $pengajuan->keterangan }}
            </div>
            <div class="form-group">
                <strong>Created By:</strong>
                {{ $pengajuan->created_by }}
            </div>
            <div class="form-group">
                <strong>Created Date:</strong>
                {{ $pengajuan->created_date }}
            </div>
            <div class="form-group">
                <strong>Approved By:</strong>
                {{ $pengajuan->approved_by }}
            </div>
            <div class="form-group">
                <strong>Approved Date:</strong>
                {{ $pengajuan->approved_date }}
            </div>
        </div>
    </div>
@endsection