@extends('layouts.master') 
@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h1 class="display-5 text-center">Update Main Warehouse</h1>

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
        <form class = "mb-5" method="post" action="{{ route('mainwarehouse.update', $mainwarehouse->id) }}">
            @method('PATCH') 
            @csrf
             <!-- Product Name Dropdown -->
          <div class="form-group">    
              <label for="productId">Product Name:</label>
              <select id='productId' name='productId'>
            <option value='0'>-- Select department --</option>
            <!-- Read Products -->
            @foreach($product['data'] as $productlist)
                <option value='{{ $productlist->id }}'>{{ $productlist->name }}</option>
            @endforeach
            </select>
            </div>
            <div class="form-group">
            <div id="datetimepicker1" class="input-append date">
                <label for="date">Date:</label>
                <input data-format="dd/MM/yyyy hh:mm:ss" type="text" value={{ $mainwarehouse->date }} />
                <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
                </span>
            </div>

            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" min="0" class="form-control" name="amount" value={{ $mainwarehouse->price }} />
            </div>

            <div class="form-group">
                <label for="unit">Discount:</label>
                <input type="text" class="form-control" name="discount" value={{ $mainwarehouse->unit }} />
            </div>
            <div class="form-group">
            <div id="datetimepicker1" class="input-append date">
                <label for="date">Date:</label>
                <input data-format="dd/MM/yyyy hh:mm:ss" type="text" value={{ $mainwarehouse->date }} />
                <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
                </span>
            </div>
            <div class="form-group">
                <label for="image">image:</label>
                <input type="file" class="form-control" name="image" value={{ $mainwarehouse->image }} />
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
