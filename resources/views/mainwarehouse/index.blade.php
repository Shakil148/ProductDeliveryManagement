@extends('layouts.master')

@section('content')

<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Main Warehouse</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('mainwarehouse.create')}}" class="btn btn-primary">Store More</a>
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
          <td>Address</td>
          <td>Total Quantity</td>
          <td>Discount</td>
          <td>Image</td>
          <td>Action By</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($mainwarehouse as $mainwarehouselist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$mainwarehouselist->product->name}}</td>
            <td>{{$mainwarehouselist->product->price}}</td>
            <td>{{$mainwarehouselist->product->unit}}</td>
            <td>{{$mainwarehouselist->date}}</td>
            <td>{{$mainwarehouselist->address}}</td>
            <td>{{$mainwarehouselist->amount}}</td>
            <td>{{$mainwarehouselist->discount}}</td>
            <td> <img src="{{ asset('images/' . $mainwarehouselist->product->image) }}" width="50" height="50" alt="{{ $mainwarehouselist->name }} photo" class="rounded"></td>
            <td>{{$mainwarehouselist->userName}}</td>
            <td>
                <a href="{{ route('mainwarehouse.edit',$mainwarehouselist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('mainwarehouse.destroy', $mainwarehouselist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form class ="mb-2">
            </td>
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