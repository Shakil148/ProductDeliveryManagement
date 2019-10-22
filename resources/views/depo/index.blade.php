@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 bg-secondary">Depo List</h3>
            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif
    <div>
    <a style="margin: 19px;" href="{{ route('depo.create')}}" class="btn btn-primary">New Depo</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
<table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead class="bg-dark">
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Address</td>
          <td>Contact</td>
          <td>Status</td>
          <td>Action By</td>
          <td>Invoice</td>
          <!-- <td>Invoice</td> -->
          @if( ( Auth::user()->role ) == "admin" )
          <td>Edit</td>
          <td>Delete</td>
          @endif
        </tr>
    </thead>
    
    <tbody>
        @foreach($depo as $depolist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$depolist->name}}</td>
            <td>{{$depolist->address}}</td>
            <td>{{$depolist->contact}}</td>
            <td>{{$depolist->status}}</td>
            <td>{{$depolist->userName}}</td>
            <td>
                <a href="{{ route('depo.invoice',$depolist->id)}}" class="btn btn-success"><i class="fa fa-invoice">Inv</i></a>
            </td>

            @if( ( Auth::user()->role ) == "admin" )
            <td>
                <a href="{{ route('depo.edit',$depolist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('depo.destroy', $depolist->id)}}" method="post">
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
