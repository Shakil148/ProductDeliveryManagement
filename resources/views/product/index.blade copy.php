@extends('layouts.master')

@section('content')
<div class="container mt-2"style="background-color: lightgoldenrodyellow">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            @foreach ($success->all() as $success)
              <li>{{ $success }}</li>
            @endforeach
            <h3 class="display-5 text-center mt-2 ">Products List</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('product.create')}}" class="btn btn-primary">New Product</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
<table id="table" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Per Price</td>
          <td>Unit Price</td>
          <td>Date</td>
          <td>Status</td>
          <td>Image</td>
          <td colspan = 2 class="text-center">Actions</td>
        </tr>
    </thead>
    <tbody>
            @foreach($product as $productlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$productlist->name}}</td>
            <td>{{$productlist->price}}</td>
            <td>{{$productlist->unit}}</td>
            <td>{{$productlist->date}}</td>
            <td>
                <input data-id="{{$productlist->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $productlist->status ? 'checked' : '' }}>
            </td>
            <td> <img src="{{ asset('images/' . $productlist->image) }}" width="50" height="50" alt="{{ $productlist->title }} photo" class="rounded"></td>
            <td><a href="{{ route('product.edit',$productlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            <form onclick="return confirm('Are you sure?')" 
                        action="{{ route('product.destroy', $productlist->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                        </form ></td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>


            </div>
        </div>
    </div>
</div>
@endsection
