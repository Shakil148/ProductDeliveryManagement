@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">Main Warehouse</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('mainwarehouse.create')}}" class="btn btn-primary">Store More</a>
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
          <td>Address</td>
          <td>Amount</td>
          <td>Discount</td>
          <td>Image</td>
          <td colspan = 2 class="text-center">Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($test as $mainwarehouselist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            @foreach($product as $productlist)
            <td {{ $productlist->productId }}->{{ $productlist->name }}</td>
            <td {{ $productlist->productId }}->{{ $productlist->price }}</td>
            <td {{ $productlist->productId }}->{{ $productlist->unit }}</td>
            @endforeach
            <td>{{$mainwarehouselist->date}}</td>
            <td>{{$mainwarehouselist->address}}</td>
            <td>{{$mainwarehouselist->amount}}</td>
            <td>{{$mainwarehouselist->discount}}</td>
            @foreach($product as $productlist)
            <td {{ $productlist->productId }}-><img src="data:image/jpeg;base64,'.base64_encode( $image ).'"/></td>
            @endforeach
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