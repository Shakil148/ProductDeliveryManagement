@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">All Depo Invoiced Products </h3>
 
 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Products</td>
          <td>Invoice Unit</td>
          @if( ( Auth::user()->role ) == "admin" )
          <td>Edit</td>
          <td>Delete</td>
          @endif
        </tr>
    </thead>
    
    <tbody>
        @foreach($depoInvoiceDetail as $invoiceList)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$invoiceList->product}}</td>
            <td>{{$invoiceList->invoiceUnit}}</td>
            @if( ( Auth::user()->role ) == "admin" )
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
@endsection
