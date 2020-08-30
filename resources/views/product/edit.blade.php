@extends('layouts.master') 
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="row">
    <div class="col-sm-6 offset-sm-2 mt-2">
        <h1 class="display-5 text-center bg-secondary">Update Product Form</h1>

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
        <form class = "mb-5" method="post" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" />
            </div>

            <div class="form-group">
                <label for="price">Per Price:</label>
                <input type="text" min="0" class="form-control" name="price" value="{{ $product->price }}" />
            </div>

            <div class="form-group">
                <label for="unit">Unit Price:</label>
                <input type="text" min="0" class="form-control" name="unit" value="{{ $product->unit }}" />
            </div>
            <div class="form-group">
            <div  class="input-append date">
                <label for="date">Date:</label>
                <input type="date" name="date" class="form-control" type="text" value="{{ $product->date }}" />
            </div>
            <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' class="form-control">
                    <option {{ $product->status == 'Active' ? 'selected':'' }}>Active</option>
                    <option {{ $product->status == 'Inactive' ? 'selected':'' }}>Inactive</option>
                </select>
            </div>
            <div class="form-group">
              <label for="amount">Total Stock:</label>
              <input type="text"  class="form-control" name="totalStock" value="{{ $product->totalStock }}"/>
          </div>
            <div class="form-group">
                <label for="image">image:</label>
                <input type="file" class="form-control" name="image" value="{{ $product->image }}" />
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