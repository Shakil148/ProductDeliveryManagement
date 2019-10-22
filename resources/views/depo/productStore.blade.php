@extends('layouts.master')

@section('content')
@if($product->status != "Inactive")     
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary">Store Product Form</h1>
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

      <form method="post" action="{{ route('productStore.store',$product->id) }}">
          @csrf
          <!-- Product Name Dropdown -->

            <div class="form-group">    
              <label for="productId" class="text-center">Product Name: <b class="red"> {{ $product->name }}</b></label>
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
    @else
        <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <h2>Product is Not Active</h2>
            </div>
        </div>
      </div>
    </div>
    @endif
@endsection
<script>
    $( function() {
        $('.date').datepicker(); 
        format: 'dd/mm/yy'       
    });
</script>