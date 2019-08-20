@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">Products List</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('product.create')}}" class="btn btn-primary">New User</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
  <table class="table table-responsive fixed-table-body">
    <thead>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Price</td>
          <td>Unit Cost</td>
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
                <input data-id="{{$productlist->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $user->status ? 'checked' : '' }}>
            </td>
            <td><img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/></td>
            <td>
                <a href="{{ route('product.edit',$userlist->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('product.destroy', $userlist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
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