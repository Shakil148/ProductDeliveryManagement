@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Dealers Payment List</h3>
    <!-- SEARCH FORM -->
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
            <td>Payment No</td>
            <td>Payment Type</td>
            <td>Date</td>
            <td>Account No</td>
            <td>Bank Name</td>
            <td>Amount</td>
            <td>Status</td>
            <td>Comments</td>
            <td>Action By</td>
            <td>Print</td>
            <td>Edit</td>
            <td>Delete</td>
            </tr>
        </thead>
        
        <tbody>
            @foreach($dealerbalancerecord as $paymentlist)
            <tr class="table-info">
                <td>{{$loop->iteration}}</td>
                <td>{{$paymentlist->dealer->name}}</td>
                <td>{{$paymentlist->dealer->code}}</td>
                <td>{{$paymentlist->paymentNo}}</td>
                <td>{{$paymentlist->type}}</td>
                <td>{{date('d-m-y',strtotime($paymentlist->date))}}</td>
                <td>{{$paymentlist->accountNo}}</td>
                <td>{{$paymentlist->bankName}}</td>
                <td>{{$paymentlist->amount}}<b>tk</b></td>
                <td>{{$paymentlist->status}}</td>
                <td>{{$paymentlist->comment}}</td>
                <td>{{$paymentlist->userName}}</td>
                <td>
                    <a target="_blank" href="{{ route('balance.print', $paymentlist->id)}}" class="btn btn-success"><i class="fa fa-print"></i></a>
                </td>
                <td>
                    <a href="{{ route('balance.balanceEdit', $paymentlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
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

    </div>


                </div>
            </div>
        </div>
    </div>              
<script>
$('#printInvoice').click(function(){
    Popup($('.invoice')[0].outerHTML);
    function Popup(data) 
    {
        window.print();
        return true;
    }
});
</script>

@endsection
