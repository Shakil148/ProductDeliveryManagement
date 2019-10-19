@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Products List</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('product.create')}}" class="btn btn-primary">New Product</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Per Price</td>
          <td>Unit Price</td>
          <td>Date</td>
          <td>Status</td>
          <td>Image</td>
          <td>Action By</td>
          @if( ( Auth::user()->role ) == "admin" )
          <td>Edit</td>
          <td>Delete</td>
          @endif
        </tr>
    </thead>
    
    <tbody>
        @foreach($product as $productlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$productlist->name}}</td>
            <td>{{$productlist->price}}</td>
            <td>{{$productlist->unit}}</td>
            <td>{{date('d-m-y',strtotime($productlist->date))}}</td>
            <td>{{$productlist->status}}</td>
            <td> <img src="{{ asset('images/' . $productlist->image) }}" width="50" height="50" alt="{{ $productlist->title }} photo" class="rounded"></td>
            <td>{{$productlist->userName}}</td>
            @if( ( Auth::user()->role ) == "admin" )
            <td>
                <a href="{{ route('product.edit',$productlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('product.destroy', $productlist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form class ="mb-2">
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>


            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#dtBasicExample').DataTable( {
    } );
} );
</script>
@endsection
