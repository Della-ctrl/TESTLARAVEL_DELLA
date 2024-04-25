@extends('templates.main')
@section('title', 'Home')
@section('module_name', 'Data User')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('user.create') }}"> Add New Data</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Id User</th>
            <th>Nama User</th>
            <th>Email</th>
            <th>Role</th>
            <th width="280px">Action</th>
        </tr>
        <?php $i=1; ?>
        @foreach ($data as $a)
        <tr>
            <td>{{ $i }}</td>
            <td>{{ $a->id }}</td>
            <td>{{ $a->name }}</td>
            <td>{{ $a->email }}</td>
            <td>{{ $a->role }}</td>
            <td>
                <form action="{{ route('user.destroy',$a->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('user.show',$a->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('user.edit',$a->id) }}">Edit</a>
   
                    <a class="btn btn-danger" href="{{ route('user.destroy',$a->id) }}">Delete</a>
                </form>
            </td>
            <?php $i++; ?>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection