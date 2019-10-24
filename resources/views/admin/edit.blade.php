@extends('layouts.master') 
@section('content')
@if( ( Auth::user()->role ) == "admin" )
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h2 class="display-5 text-center mt-2 bg-secondary">Update User Form</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <form class = "mb-5" method="post" action="{{ route('user.update', $user->id) }}"enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" />
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="{{ $user->address }}" />
            </div>

            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" name="contact" value="{{ $user->contact }}" />
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="{{ $user->email }}" />
            </div>
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="designation" class="form-control" name="designation" value="{{ $user->designation }}" />
            </div>
            <div class="form-group">    
              <label for="role">Role:</label>
                <select id='role' name='role' class="form-control">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected':'' }}>Admin</option>
                    <option value="moderator"{{ $user->role == 'moderator' ? 'selected':'' }}>Moderator</option>
                    <option value="tsm" {{ $user->role == 'tsm' ? 'selected':'' }}>TSM</option>
                    <option value="accounts" {{ $user->role == 'accounts' ? 'selected':'' }}>Accounts</option>
                    <option value="factoryIncharge" {{ $user->role == 'factoryIncharge' ? 'selected':'' }}>Factory Incharge</option>
                    <option value="viewer" {{ $user->role == 'viewer' ? 'selected':'' }}>Viewer</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image" value={{ $user->image }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@else
        <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <h2>You are Not Admin</h2>
            </div>
        </div>
      </div>
    </div>
@endif
@endsection
