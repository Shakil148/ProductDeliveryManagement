@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
    <h3 class="display-5 text-center bg-secondary">All Users List</h3>   
    <div>
    <a style="margin: 19px;" href="{{ route('user.create')}}" class="btn btn-primary">New User</a>
    </div> 
  <div class="table-hover table-striped table-bordered ">
  <table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Address</td>
          <td>Contact</td>
          <td>Email</td>
          <td>Designation</td>
          <td>Role</td>
          <td>Image</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($user as $userlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$userlist->name}}</td>
            <td>{{$userlist->address}}</td>
            <td>{{$userlist->contact}}</td>
            <td>{{$userlist->email}}</td>
            <td>{{$userlist->designation}}</td>
            <td>{{$userlist->role}}</td>
            
            <td>
            <img src="{{ asset('images/images.jpg') }}" width="50" height="50" class="img-circle elevation-2" alt="{{ asset('images/images.jpg') }}">
            </td>
            <td>
                <a href="{{ route('user.edit',$userlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('user.destroy', $userlist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger"  type="submit"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    {{$user->links()}}
  </div>
 
</tbody>
        <div class="col-sm-12">

                @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}  
                </div>
                @endif
        </div>
</div>
</div>
</div>
@endsection