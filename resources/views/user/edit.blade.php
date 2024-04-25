@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Edit User')
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
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
   
<form action="{{ route('user.update') }}" method="POST">
    @csrf
  
     <div class="row">
        <input type="hidden" name="id" class="form-control" value="{{$user->id}}">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama User:</strong>
                <input type="text" name="name" class="form-control" value="{{$user->name}}" placeholder="Nama User">
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" class="form-control" value="{{$user->email}}" placeholder="Email">
            </div>
            <div class="form-group">
                <strong>Password:</strong>
                <input type="text" name="password" class="form-control" value="" placeholder="Password">
            </div>
            <div class="form-group">
                <strong>Kategori:</strong>
                <select class="form-control" name="role">
                    <option>--Pilih Kategori--</option>
                    <option value="ADMIN" <?=$user->role == 'ADMIN' ? ' selected="selected"' : '';?>>ADMIN</option>
                    <option value="KARYAWAN" <?=$user->role == 'KARYAWAN' ? ' selected="selected"' : '';?>>KARYAWAN</option>
                    <option value="SPV" <?=$user->role == 'SPV' ? ' selected="selected"' : '';?>>SPV</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection