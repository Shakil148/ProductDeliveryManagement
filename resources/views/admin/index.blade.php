@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
    <h3 class="display-5 text-center ">All Users List</h3>   
    <div>
    <a style="margin: 19px;" href="{{ route('user.create')}}" class="btn btn-primary">New User</a>
    </div> 
  <div class="table-hover table-striped table-bordered ">
  <table class="table table-responsive fixed-table-body">
    <thead>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Address</td>
          <td>Contact</td>
          <td>Email</td>
          <td>Designation</td>
          <td>Role</td>
          <td>Image</td>
          <td colspan = 2 class="text-center">Actions</td>
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
            <td><img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/></td>
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