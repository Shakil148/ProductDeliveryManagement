@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary">Create New Product</h1>
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
      <form method="post" action="{{ route('product.store') }}"enctype="multipart/form-data">
          @csrf
          <div class="form-group">    
              <label for="name">Name:</label>
              <input type="text" class="form-control" name="name"/>
          </div>

          <div class="form-group">
              <label for="price">Per Price:</label>
              <input type="text" min="0" class="form-control" name="price"/>
          </div>
          <div class="form-group">
              <label for="unit">Unit Price:</label>
              <input type="text" min="0" class="form-control" name="unit"/>
          </div>
          <div class="form-group">
          <label for="date">Date:</label>
            <div id="datetimepicker1" class="input-append date">
              <input type="date" name="date"  class="form-control" data-format="dd/MM/yyyy" type="text" />
            </div>
          </div>
          <div class="form-group">
              <label for="image">Image:</label>
              <input type="file" class="form-control" name="image"/>
          </div>                       
          <button type="submit" class="btn btn-primary mb-5">Add Product</button>
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
