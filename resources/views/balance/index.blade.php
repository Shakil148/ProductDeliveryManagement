@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">Payment List</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('balance.create')}}" class="btn btn-primary">New Payment</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
 <table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
          <td>#</td>
          <td>Dealer Name</td>
          <td>Payment Type</td>
          <td>Date</td>
          <td>Account No</td>
          <td>Bank Name</td>
          <td>Amount</td>
          <td>Status</td>
          <td>Created Date</td>
          <td colspan = 2 class="text-center">Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($dealerbalancerecord as $paymentlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$paymentlist->dealer->name}}</td>
            <td>{{$paymentlist->type}}</td>
            <td>{{$paymentlist->date}}</td>
            <td>{{$paymentlist->accountNo}}</td>
            <td>{{$paymentlist->bankName}}</td>
            <td>{{$paymentlist->amount}}<b>tk</b></td>
            <td>{{$paymentlist->status}}</td>
            <td>{{date('d-m-y',strtotime($paymentlist->created_at))}}</td>
            <td>
                <a href="{{ route('balance.edit',$paymentlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('balance.destroy', $paymentlist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form class ="mb-2">
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
    {{$payment->links()}}
  </div>


            </div>
        </div>
    </div>
</div>
@endsection
