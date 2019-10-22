@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary">New Depo Form</h1>
  <div>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
      <form method="post" action="{{ route('depo.store') }}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name" value="{{ old('name')}}" />
          </div>
          <div class="form-group">    
              <label for="name">Address:</label>
              <input type="text" class="form-control" name="address" value="{{ old('address')}}" />
          </div>
          <div class="form-group">    
              <label for="name">Contact:</label>
              <input type="number" class="form-control" name="contact" value="{{ old('contact')}}" />
          </div>

          <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' value="{{ old('status')}}" class="form-control">
                <option value=''>-- Select Status --</option>
                    <option value='Active'>Active</option>
                    <option value='Inactive'>Inactive</option>
                </select>
          </div>                     
          <button type="submit" class="btn btn-primary mb-5">Create</button>
      </form>
  </div>
</div>
</div>

@endsection
<script>
    $( function() {
        $('.date').datepicker(); 
        format: 'dd/mm/yy'       
    });
</script>

