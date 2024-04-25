@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Edit Barang')
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
   
<form action="{{ route('pengajuan.update') }}" method="POST">
    @csrf
  
     <div class="row">
        <input type="hidden" name="id_barang" class="form-control" value="{{$barang->id_barang}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Barang:</strong>
                <input type="text" name="nama_barang" class="form-control" value="{{$barang->nama_barang}}" placeholder="Nama Barang">
            </div>
            <div class="form-group">
                <strong>Kategori:</strong>
                <select class="form-control" name="id_kategori">
                    <option>--Pilih Kategori--</option>
                        @foreach($kategori as $p)
                            @if($p->id_kategori == $barang->id_kategori)
                                <option value="{{$p->id_kategori}}" selected>{{$p->nama_kategori}}</option>
                            @else
                                <option value="{{$p->id_kategori}}">{{$p->nama_kategori}}</option>
                            @endif
                        @endforeach
                </select>
            </div>
            <div class="form-group">
                <strong>Supplier:</strong>
                <select class="form-control" name="id_supplier">
                    <option>--Pilih Supplier--</option>
                        @foreach($supplier as $p)
                            @if($p->id_supplier == $barang->id_supplier)
                                <option value="{{$p->id_supplier}}" selected>{{$p->nama_supplier}}</option>
                            @else
                                <option value="{{$p->id_supplier}}">{{$p->nama_supplier}}</option>
                            @endif
                        @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection