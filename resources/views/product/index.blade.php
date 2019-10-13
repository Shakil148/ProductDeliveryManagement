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
          <td>Edit</td>
          <td>Delete</td>
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
            <td>
                <input data-id="{{$productlist->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $productlist->status ? 'checked' : '' }}>
            </td>
            <td> <img src="{{ asset('images/' . $productlist->image) }}" width="50" height="50" alt="{{ $productlist->title }} photo" class="rounded"></td>
            <td>{{$productlist->userName}}</td>
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
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/changeStatus',
            data: {'status': status, 'id': id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
@endsection
