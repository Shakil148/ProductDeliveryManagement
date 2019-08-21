@extends('layouts.master') 
@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h1 class="display-5 text-center">Update a User</h1>

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
        <form class = "mb-5" method="post" action="{{ route('product.update', $product->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value={{ $product->name }} />
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" min="0" class="form-control" name="price" value={{ $product->price }} />
            </div>

            <div class="form-group">
                <label for="unit">Unit Cost:</label>
                <input type="number" min="0" class="form-control" name="unit" value={{ $product->unit }} />
            </div>
            <div class="form-group">
            <div id="datetimepicker1" class="input-append date">
                <label for="date">Date:</label>
                <input data-format="dd/MM/yyyy hh:mm:ss" type="text" value={{ $product->date }} />
                <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
                </span>
            </div>
            <div class="form-group">
                <label for="image">image:</label>
                <input type="file" class="form-control" name="image" value={{ $product->image }} />
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
