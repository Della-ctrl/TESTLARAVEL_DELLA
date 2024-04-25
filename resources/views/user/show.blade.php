@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Show User')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama User:</strong>
                {{ $user->name }}
            </div>
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
            <div class="form-group">
                <strong>role:</strong>
                {{ $user->role }}
            </div>
        </div>
    </div>
@endsection