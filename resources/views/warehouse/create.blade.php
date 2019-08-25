@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2">Order</h1>
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

            
      <form method="post" action="{{ route('warehouse.store') }}">
          @csrf
          
          <div class="form-group">
              <label for="address">Order No:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
  
          <div class="form-group">    
              <label for="productId">Product Name:</label>
                <select id='productId' name='productId'>
                <option value='0'>-- Select Product --</option>
                <!-- Read Products -->
                @foreach($product as $productlist)
                    <option value='{{ $productlist->id }}'>{{ $productlist->name }}</option>
                @endforeach
                </select>
            </div>
            
            <div class="form-group">
            <label for="date">Date:</label>
                <div id="datetimepicker1" class="input-append date">
                <input type="date_format" name="date"  class="col-md-12" data-format="dd/MM/yyyy hh:mm:ss" type="text" />
                <span class="add-on">
                    <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                    </i>
                </span>
                </div>
            </div>
            <div class="form-group">
              <label for="address">Address:</label>
              <input type="text" class="form-control" name="address"/>
          </div>
          <div class="form-group">
              <label for="amount">Amount:</label>
              <input type="number" min="0" class="form-control" name="amount"/>
          </div>
          <div class="form-group">
              <label for="discount">Discount:</label>
              <input type="text" class="form-control" name="discount"/>
          </div>                    
          <button type="submit" class="btn btn-primary mb-5">Add Product</button>
      </form>
  </div>
</div>
</div>
@endsection
