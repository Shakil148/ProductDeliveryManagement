@extends('layouts.master')

@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary">Store New Product Form</h1>
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

            
      <form method="post" action="{{ route('mainwarehouse.store') }}">
          @csrf
          <!-- Product Name Dropdown -->

         
          <div class="form-group">    
              <label for="productId">Product Name:</label>
                <select id='productId' name='productId' class="form-control">
                <option value='0'>-- Select Product --</option>
                <!-- Read Products -->
                @foreach($product as $productlist)
                    <option value='{{ $productlist->id }}'>{{ $productlist->name }}</option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group">
            <label for="date">Date:</label>
                <div  class="input-append date">
                <input type="date" name="date" class="form-control" type="text" />
                </div>
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="amount">Quantity:</label>
              <input type="number" min="0" class="form-control" name="amount"/>
          </div>
          <div class="form-group">
              <label for="discount">Discount:</label>
              <input type="text" class="form-control" name="discount"/>
          </div>                    
          <button type="submit" class="btn btn-primary mb-5">Store Product</button>
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