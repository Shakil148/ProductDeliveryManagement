@extends('layouts.master') 
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="row">
    <div class="col-sm-6 offset-sm-2 mt-2">
        <h1 class="display-5 text-center bg-secondary">Update Main Warehouse Form</h1>

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
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <form class = "mb-5" method="post" action="{{ route('mainwarehouse.update', $mainwarehouse->id) }}">
            @method('PATCH') 
            @csrf
             <!-- Product Name Dropdown -->
            <div class="form-group">    
              <label for="productId">Product Name:</label>
                <select id='productId' name='productId' class="form-control">
                @foreach($product as $productlist)
                    <option value='{{ $productlist->id }}'@if($productlist->id == $mainwarehouse->productId) selected='selected'disabled @endif>{{ $productlist->name }}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">
            <div id="datetimepicker1" class="input-append date">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" type="text" value="{{ $mainwarehouse->date }}" />
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" class="form-control" name="address" value="{{ $mainwarehouse->address }}" />
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" min="0" class="form-control" name="amount" value={{ $mainwarehouse->amount }} />
            </div>

            <div class="form-group">
                <label for="discount">Discount:</label>
                <input type="text" class="form-control" name="discount" value="{{ $mainwarehouse->discount }}" />
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
<script>
    $( function() {
        $('.date').datepicker(); 
        format: 'dd/mm/yy'       
    });
</script>
