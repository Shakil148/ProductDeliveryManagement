@extends('layouts.master')

@section('content')
<script src="https://cdn.datatables.net/plug-ins/1.10.20/api/sum().js"></script>
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Invoice List</h3>

 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Dealer Name</td>
          <td>Code</td>
          <td>Invoice No</td>
          <td>InvDate</td>
          <td>Grand Unit</td>
          <td class="text-center">Grand Price</td>
          <td>Truck No</td>
          <td>Driver Name</td>
          <td>Driver Mobile</td>
          <td>Comment</td>
          <td>Action By</td>
          <td>Details</td>
          <td>Print</td>
          <td>Edit</td>
          <td>Delete</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($dealerInvoice as $invoiceList)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$invoiceList->dealer->name}}</td>
            <td>{{$invoiceList->dealer->code}}</td>
            <td>{{$invoiceList->invoiceNo}}</td>
            <td>{{date('d-m-y', strtotime($invoiceList->date))}}</td>
            <td>{{$invoiceList->grandTotalUnit}}</td>
            <td class="text-center">{{$invoiceList->totalPrice}}</td>
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

            <td>
                <a href="{{ route('order.invoiceEdit', $invoiceList->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('order.destroy', $invoiceList->id)}}" method="post">
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
                <th></th>
                <th></th>
                <th></th>
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
            columns = [5, 6]; // Add columns here

        for (var i = 0; i < columns.length; i++) {
            $('tfoot th').eq(columns[i]).html('Page: ' + api.column(columns[i], { filter: 'applied', page: 'current' }).data().sum() + '<br>');
            $('tfoot th').eq(columns[i]).append('All: ' + api.column(columns[i], {filter: 'applied'}).data().sum() );
        }
    }
});
})
</script>
@endsection
