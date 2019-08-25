@extends('layouts.master')

@section('content')
<div class="container mt-2">
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">Dealers List</h3>
    <div>
    <a style="margin: 19px;" href="{{ route('dealer.create')}}" class="btn btn-primary">New Product</a>
    </div>
 <div class="table-hover table-striped table-bordered ">
  <table class="table table-responsive fixed-table-body">
    <thead>
        <tr>
          <td>#</td>
          <td>Name</td>
          <td>Contact</td>
          <td>Address</td>
          <td>Status</td>
          <td colspan = 2 class="text-center">Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($dealer as $dealerlist)
        <tr class="table-info">
            <td>{{$loop->iteration}}</td>
            <td>{{$dealerlist->name}}</td>
            <td>{{$dealerlist->contact}}</td>
            <td>{{$dealerlist->address}}</td>
            <td>{{$dealerlist->status}}</td>
            <td>
                <a href="{{ route('dealer.edit',$dealerlist->id)}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="{{ route('dealer.destroy', $dealerlist->id)}}" method="post">
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
