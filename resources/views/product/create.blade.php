@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Create s New User</h1>
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
      <form method="post" action="{{ route('product.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">First Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="price">Price:</label>
              <input type="integer" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="unit">Unit Cost:</label>
              <input type="number" class="form-control" name="unit"/>
          </div>
          <div class="form-group">
            <div id="datetimepicker1" class="input-append date">
                <label for="date">Date:</label>
                <input data-format="dd/MM/yyyy hh:mm:ss" type="text">
                <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
                </span>
            </div>
            </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>                       
          <button type="submit" class="btn btn-primary-outline">Add User</button>
      </form>
  </div>
</div>
</div>
@endsection
