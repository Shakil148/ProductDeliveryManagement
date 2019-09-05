@extends('layouts.master')
@section('content')
@include('partials.header')
    <div class="row">
        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
            <h1>Checkout</h1>
            <h4>Your Total: ${{ $total }} </h4>
            <form action=" {{route('warehouses.checkout')}} ">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label for="name" >Name</label>
                            <input type="text" id="name" class="form-control">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
                
@endsection