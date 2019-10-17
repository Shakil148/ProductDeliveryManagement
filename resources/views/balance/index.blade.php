@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Dealers Payment List</h3>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
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
            <td>PayDate</td>
            <td>Account No</td>
            <td>Bank Name</td>
            <td class="text-center">Amount</td>
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
                <td class="text-center">{{$paymentlist->amount}}</td>
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
        <tfoot>
        <tr>
            <th colspan="8" class="border-0" style="text-align:left"></th>
            <th class="border-bottom-0 border-right-0 border-left-0">></th>
        </tr>
    </tfoot>
    </table>

    </div>


                </div>
            </div>
        </div>
    </div>              
<script>
// Basic example of pagination
$(document).ready(function() {
    $('#dtBasicExample').DataTable( {
        "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 8 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Total over this page
            pageTotal = api
                .column( 8, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
 
            // Update footer
            $( api.column( 8 ).footer() ).html(
                'Total:'+pageTotal +'tk'+'\n'+'  Grand:'+ total +'tk'
            );
        }
    } );
} );
</script>

@endsection
