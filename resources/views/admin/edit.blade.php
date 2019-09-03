@extends('layouts.master') 
@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h2 class="display-5 text-center mt-2">Update a User</h2>

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
                    <option {{ $user->role == 'admin' ? 'selected':'' }}>Admin</option>
                    <option {{ $user->role == 'moderator' ? 'selected':'' }}>Moderator</option>
                    <option {{ $user->role == 'tsm' ? 'selected':'' }}>TSM</option>
                    <option {{ $user->role == 'accounts' ? 'selected':'' }}>Accounts</option>
                    <option {{ $user->role == 'viewer' ? 'selected':'' }}>Viewer</option>
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
@endsection
