@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">Invoice List</h3>
   
 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
          <td>#</td>
          <td>Dealer Name</td>
          <td>Invoice No</td>
          <td>Grand Unit</td>
          <td>Grand Price</td>
          <td>Comment</td>
          <td>Details</td>
          <td colspan = 3 class="text-center">Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($dealerInvoice as $invoiceList)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$invoiceList->dealer->name}}</td>
            <td>{{$invoiceList->invoiceNo}}</td>
            <td>{{$invoiceList->grandTotalUnit}}</td>
            <td>{{$invoiceList->totalPrice}}</td>
            <td>{{$invoiceList->comment}}</td>
            <td class="text-center"> 
                <a href="/invoicedetail/{{$invoiceList->id}}"><i class="fa fa-eye"></i></a>
            </td>
            <td class="text-center"> 
                <a href="{{ route('order.invoiceprint', $invoiceList->id)}}"><i class="fa fa-print"></i></a>
            </td>

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
