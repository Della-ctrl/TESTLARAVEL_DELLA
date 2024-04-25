@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Tambah Pengajuan')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('pengajuan.index') }}"> Back</a>
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
   
<form action="{{ route('pengajuan.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Barang:</strong>
                <select class="form-control" name="id_barang">
                    <option>--Pilih Barang--</option>
                    @foreach($barang as $p)
                        <option value="{{$p->id_barang}}">{{$p->nama_barang}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <strong>Jumlah Barang:</strong>
            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Barang">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Keterangan:</strong>
                <textarea name="keterangan" class="form-control" cols="30" rows="10"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection