@extends('layouts.master')

@section('content')
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Depo Invoice List</h3>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
            @if(Session::has('failed'))
            <div class="alert alert-danger">
                {{Session::get('failed')}}
            </div>
            @endif

 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Depo Name</td>
          <td>Address</td>
          <td>Invoice No</td>
          <td>InvDate</td>
          <td>Grand Unit</td>
          <td>Truck No</td>
          <td>Driver Name</td>
          <td>Driver Mobile</td>
          <td>Comment</td>
          <td>Action By</td>
          <td>Details</td>
          <td>Print</td>
          @if( ( Auth::user()->role ) == "admin" )
          <td>Edit</td>
          <td>Delete</td>
          @endif
        </tr>
    </thead>
    
    <tbody>
        @foreach($depoInvoices as $invoiceList)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$invoiceList->depo->name}}</td>
            <td>{{$invoiceList->depo->address}}</td>
            <td>{{$invoiceList->invoiceNo}}</td>
            <td>{{date('d-m-y', strtotime($invoiceList->date))}}</td>
            <td>{{$invoiceList->grandTotalUnit}}</td>
            <td>{{$invoiceList->truckNo}}</td>
            <td>{{$invoiceList->driverName}}</td>
            <td>{{$invoiceList->driverMobile}}</td>
            <td>{{$invoiceList->comment}}</td>
            <td>{{$invoiceList->userName}}</td>
            <td class="text-center"> 
                <a href="/depoInvoiceDetail/{{$invoiceList->id}}"class="btn btn-body"><i class="fa fa-eye"></i></a>
            </td>
            <td class="text-center"> 
                <a  target="_blank" href="{{ route('depo.depoInvoicePrint', $invoiceList->id)}} "class="btn btn-success"><i class="fa fa-print "></i></a>
            </td>
            @if( ( Auth::user()->role ) == "admin" )
            <td>
                <a href="{{ route('depoInvoice.edit', $invoiceList->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('depoInvoice.destroy', $invoiceList->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach

    </tbody>
    <tfoot>
        <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                @if( ( Auth::user()->role ) == "admin" )
                <th></th>
                <th></th>
                @endif
        </tr>
    </tfoot>
  </table>
  </div>


            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {

// SUM PLUGIN
jQuery.fn.dataTable.Api.register( 'sum()', function ( ) {
    return this.flatten().reduce( function ( a, b ) {
        if ( typeof a === 'string' ) {
            a = a.replace(/[^\d.-]/g, '') * 1;
        }
        if ( typeof b === 'string' ) {
            b = b.replace(/[^\d.-]/g, '') * 1;
        }

        return a + b;
    }, 0 );
} );

$('#dtBasicExample').DataTable({
    "footerCallback": function () {
        var api = this.api(),
            columns = [5]; // Add columns here

        for (var i = 0; i < columns.length; i++) {
            $('tfoot th').eq(columns[i]).html('Page: ' + api.column(columns[i], { filter: 'applied', page: 'current' }).data().sum() + '<br>');
            $('tfoot th').eq(columns[i]).append('All: ' + api.column(columns[i], {filter: 'applied'}).data().sum() );
        }
    }
});
})
</script>
@endsection
