@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Distribution Cost List</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('distributor.create')}}" class="btn btn-primary"> New Depo Cost</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
 <table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Invoice Numbers</td>
          <td>Date</td>
          <td>Driver Name</td>
          <td>Helper Name</td>
          <td>Driver Contact</td>
          <td>Car No</td>
          <td>Location Starts</td>
          <td>Location Ends</td>
          <td>KPL Cost</td>
          <td>Police Cost</td>
          <td>Food Allowance Cost</td>
          <td>Maintaining Cost</td>
          <td>Toll Cost</td>
          <td>Others Cost</td>
          <td>Total Cost</td>
          <td>Print</td>
          @if( ( Auth::user()->role ) == "admin" )
          <td>Edit</td>
          <td>Delete</td>
          @endif
        </tr>
    </thead>
    
    <tbody>
        @foreach($distributor as $distributorlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$distributorlist->invoiceNo}}</td>
            <td>{{date('d-m-y',strtotime($distributorlist->date))}}</td>
            <td>{{$distributorlist->driverName}}</td>
            <td>{{$distributorlist->helperName}}</td>
            <td>{{$distributorlist->contact}}</td>
            <td>{{$distributorlist->carNo}}</td>
            <td>{{$distributorlist->locationStart}}</td>
            <td>{{$distributorlist->locationEnd}}</td>
            <td>{{$distributorlist->kplCost}}</td>
            <td>{{$distributorlist->policeCost}}</td>
            <td>{{$distributorlist->foodAllowanceCost}}</td>
            <td>{{$distributorlist->maintainingCost}}</td>
            <td>{{$distributorlist->tollCost}}</td>
            <td>{{$distributorlist->othersCost}}</td>
            <td>{{$distributorlist->totalCost}}</td>

            <td>
                <a target="_blank" href="{{ route('distributor.print',$distributorlist->id)}}" class="btn btn-success"><i class="fa fa-print"></i></a>
            </td>
            @if( ( Auth::user()->role ) == "admin" )
            <td>
                <a href="{{ route('distributor.edit',$distributorlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('distributor.destroy', $distributorlist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form class ="mb-2">
            </td>
            @endif
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
$(document).ready(function() {
    $('#dtBasicExample').DataTable( {
    } );
} );
</script>
@endsection
