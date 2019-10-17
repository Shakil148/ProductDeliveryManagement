@extends('layouts.master')

@section('content')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<div class="container  mt-2" id="reportrange span">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Dealers Account Summary</h3>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 100%">
            <i class="fa fa-calendar"></i>&nbsp;
            <span></span> <i class="fa fa-caret-down"></i>
            </div>
            @foreach($accountSummary as $dealerlist)
            <h5 class="text-right"> 
                <a  target="_blank" href="{{ route('accountSummary.print', $dealerlist->id)}} "class="btn btn-success"><i class="fa fa-print "></i></a>
            </h5>
            <h5 class="text-center red"><b>Dealer Name:{{$dealerlist->name}}</b></h5>
            <h5 class="text-center">Address:{{$dealerlist->address}}</h5>
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
    
    <table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
        <thead class="bg-dark">
            <tr>
            <td>Date</td>
            <td>Details</td>
            <td>Paid Amount</td>
            <td>DO Amount</td>
            <td>Balance</td>
            <td>Delete</td>

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
                <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('accountSummary.destroy', $paymentlist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
        <tr>
            <th colspan="3" style="text-align:right">Total:</th>
            <th></th>
        </tr>
    </tfoot>
    </table>

    </div>
    <h4 class="text-center green"><b>Remain Balance :  {{$dealerlist->amount}}</b></h4>
    @endforeach


            </div>
        </div>
    </div>              

<script type="text/javascript">
$(function() {

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>
@endsection
