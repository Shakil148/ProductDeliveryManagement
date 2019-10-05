@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary">Create New Distributor</h1>
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
      <form method="post" action="{{ route('distributor.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="number" min="0" class="form-control" name="contact"/>
          </div>
          <div class="form-group">
              <label for="carNo">Car No:</label>
              <input type="text"  class="form-control" name="carNo"/>
          </div>                      
          <button type="submit" class="btn btn-primary mb-5">Add Distributor </button>
      </form>
  </div>
</div>
</div>
@endsection
