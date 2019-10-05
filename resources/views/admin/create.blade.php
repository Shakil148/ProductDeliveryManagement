@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary">Create New User</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
    @endif
      <form method="post" action="{{ route('register') }}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="price">Address:</label>
              <input type="text"  class="form-control" name="address"/>

          <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="number" min="0" class="form-control" name="contact"/>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="email"  class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="password">Password:</label>
              <input type="password" id="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
              <label for="password-confirm">Confirm Password:</label>
              <input type="password" id="password-confirm" class="form-control" name="password_confirmation"/>
          </div>

          <div class="form-group">
              <label for="designation">Designation:</label>
              <input type="designation"  class="form-control" name="designation"/>
          </div>

          <div class="form-group">
                <label for="role">Role:</label>
                <div class=>
                    <select name="role"  class="form-control" >
                        <option value="admin">Admin</option>
                        <option value="moderator">Moderator</option>
                        <option value="tsm">TSM</option>
                        <option value="accounts">Accounts</option>
                        <option value="viewer">Viwer</option>
                    </select> 

                </div>
            </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>                       
          <button type="submit" class="btn btn-primary mb-5">Add User</button>
      </form>
  </div>
</div>
</div>
@endsection

                           

                            