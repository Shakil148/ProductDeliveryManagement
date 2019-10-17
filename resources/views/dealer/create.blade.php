@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary"> New Dealer Form</h1>
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
      <form method="post" action="{{ route('dealer.store') }}">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="code">Code:</label>
              <input type="text" value = {{$newId}} class="form-control" name="code" readonly/>
          </div>

          <div class="form-group">
              <label for="contact">Contact:</label>
              <input type="number" min="0" maxlength="11" class="form-control" name="contact"/>
          </div>
          <div class="form-group">
              <label for="address">Address:</label>
              <input type="text"  class="form-control" name="address"/>
          </div>
          <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' class="form-control">
                <option value=''>-- Select Status --</option>
                    <option value='Active'>Active</option>
                    <option value='Inactive'>Inactive</option>
                </select>
            </div>                       
          <button type="submit" class="btn btn-primary mb-5">Create Dealer</button>
      </form>
  </div>
</div>
</div>
@endsection
