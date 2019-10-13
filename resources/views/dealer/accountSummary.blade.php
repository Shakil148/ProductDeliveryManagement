@extends('layouts.master')

@section('content')
<div class="container  mt-2" id="box">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Dealers Account Summary</h3>
            @foreach($accountSummary as $dealerlist)
            <h5 class="text-right"> 
                <a  target="_blank" href="{{ route('accountSummary.print', $dealerlist->id)}} "class="btn btn-success"><i class="fa fa-print "></i></a>
            </h5>
            <h5 class="text-center red"><b>Dealer Name:{{$dealerlist->name}}</b></h5>
            <h5 class="text-center">Code:{{$dealerlist->code}}</h5>
    <!-- SEARCH FORM -->
    <!-- <form action="/search" method="get" class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form> -->

    <div class="table-hover table-striped table-bordered ">
    <table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
        <thead class="bg-dark">
            <tr>
            <td>Date</td>
            <td>Details</td>
            <td>Paid Amount</td>
            <td>DO Amount</td>
            <td>Balance</td>

            </tr>
        </thead>
        
        <tbody>
            @foreach($dealerlist->accountSummary as $paymentlist)
            <tr class="table-info">
                <td>{{date('d-m-y',strtotime($paymentlist->date))}}</td>
                <td>{{$paymentlist->paymentNo}} {{$paymentlist->invoiceNo}}</td>
                <td>{{$paymentlist->paidAmount}}</td>
                <td>{{$paymentlist->doAmount}}</td>
                <td step = "0">{{$paymentlist->balance}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    </div>
    <h5 class="text-center">Remain Balance:{{$dealerlist->amount}}</h5>
    @endforeach


                </div>
            </div>
        </div>
    </div>              


@endsection
