@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Invoice List</h3>
    <!-- <form action="/search" method="get" class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-check"></i>
          </button>
        </div>
      </div>
    </form> -->
 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Dealer Name</td>
          <td>Code</td>
          <td>Invoice No</td>
          <td>Date</td>
          <td>Grand Unit</td>
          <td>Grand Price</td>
          <td>Truck No</td>
          <td>Driver Name</td>
          <td>Driver Mobile</td>
          <td>Comment</td>
          <td>Action By</td>
          <td>Details</td>
          <td>Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($dealerInvoice as $invoiceList)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$invoiceList->dealer->name}}</td>
            <td>{{$invoiceList->dealer->code}}</td>
            <td>{{$invoiceList->invoiceNo}}</td>
            <td>{{date('d-m-y',strtotime($invoiceList->date))}}</td>
            <td>{{$invoiceList->grandTotalUnit}}</td>
            <td>{{$invoiceList->totalPrice}}</td>
            <td>{{$invoiceList->truckNo}}</td>
            <td>{{$invoiceList->driverName}}</td>
            <td>{{$invoiceList->driverMobile}}</td>
            <td>{{$invoiceList->comment}}</td>
            <td>{{$invoiceList->userName}}</td>
            <td class="text-center"> 
                <a href="/invoicedetail/{{$invoiceList->id}}"class="btn btn-body"><i class="fa fa-eye"></i></a>
            </td>
            <td class="text-center"> 
                <a  target="_blank" href="{{ route('order.invoiceprint', $invoiceList->id)}} "class="btn btn-success"><i class="fa fa-print "></i></a>
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
