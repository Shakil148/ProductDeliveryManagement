@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">Payment List</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('payment.create')}}" class="btn btn-primary">New Payment</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
  <table class="table table-responsive fixed-table-body">
    <thead>
        <tr>
          <td>#</td>
          <td>Dealer Name</td>
          <td>Payment Type</td>
          <td>Date</td>
          <td>Account No</td>
          <td>Amount</td>
          <td>Status</td>
          <td>Created Date</td>
          <td colspan = 2 class="text-center">Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($payment as $paymentlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$paymentlist->name}}</td>
            <td>{{$paymentlist->type}}</td>
            <td>{{$paymentlist->date}}</td>
            <td>{{$paymentlist->accountNo}}</td>
            <td>{{$paymentlist->amount}}</td>
            <td>{{$paymentlist->status}}</td>
            <td>{{$paymentlist->created_at}}</td>
            <td>
                <a href="{{ route('payment.edit',$paymentlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('payment.destroy', $paymentlist->id)}}" method="post">
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
