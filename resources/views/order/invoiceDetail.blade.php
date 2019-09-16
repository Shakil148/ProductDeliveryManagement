@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">All Invoiced Products </h3>
   
 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
          <td>#</td>
          <td>Products</td>
          <td>Unit Price</td>
          <td>Invoice Unit</td>
          <td>Free Unit</td>
          <td>Total Unit</td>
          <td>Total Price</td>
          <td colspan = 2 class="text-center">Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($invoiceDetail as $invoiceList)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$invoiceList->product}}</td>
            <td>{{$invoiceList->price}}</td>
            <td>{{$invoiceList->invoiceUnit}}</td>
            <td>{{$invoiceList->freeUnit}}</td>
            <td>{{$invoiceList->totalUnit}}</td>
            <td>{{$invoiceList->total}}</td>

            <td>
                <a href="#" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="#" method="post">
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
