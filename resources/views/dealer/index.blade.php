@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
                <h3 class="display-5 text-center mt-2 bg-secondary">Dealers List</h3>
                <div>
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
        @if( ( Auth::user()->role ) != "viewer" )
        <a style="margin: 19px;" href="{{ route('dealer.create')}}" class="btn btn-primary">New Dealer</a>
        @endif
    </div>
 <div class="table-hover table-striped table-bordered ">
 <table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Code</td>
          <td>Contact</td>
          <td>Address</td>
          <td>Status</td>         
          @if( ( Auth::user()->role ) == "admin" )
          <td>Balance</td>
          @endif
          <td>Statements</td>
          <td>Invoice</td>
          @if( ( Auth::user()->role ) != "viewer" )
          <td>Payment</td>
          @if( ( Auth::user()->role ) == "admin" )
          <td>Edit</td>
          <td>Delete</td>
          @endif
          @endif
        </tr>
    </thead>
    
    <tbody>
        @foreach($dealer as $dealerlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$dealerlist->name}}</td>
            <td>{{$dealerlist->code}}</td>
            <td>{{$dealerlist->contact}}</td>
            <td>{{$dealerlist->address}}</td>
            <td>{{$dealerlist->status}}</td>
            @if( ( Auth::user()->role ) == "admin" )
            <td>{{$dealerlist->amount}}</td>
            @endif
            <td class="text-center">
                <a href="{{ route('dealer.summary',$dealerlist->id)}}" class="btn btn-body"><i class="fa fa-retweet green"></i></a>
            </td>
            <td>
                <a href="{{ route('order.invoice',$dealerlist->id)}}" class="btn btn-success"><i class="fas fa-truck-movin">INV</i></a>
            </td>
            @if( ( Auth::user()->role ) != "viewer" )
            <td class="text-center">
                <a href="{{ route('balance.edit',$dealerlist->id)}}" class="btn btn-warning"><i class="fab fa-amazon-pa">PAY</i></a>
            </td>
            @if( ( Auth::user()->role ) == "admin" )
            <td>
                <a href="{{ route('dealer.edit',$dealerlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('dealer.destroy', $dealerlist->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                </form>
            </td>
            @endif
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
