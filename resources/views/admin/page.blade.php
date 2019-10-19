@extends('layouts.master')

@section('content')
@if( ( Auth::user()->role ) == "admin" )
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
            <!-- <h2 class="text-center">You are Logged in as <b class="red">Admin<b></h2> -->

            </div>
        </div>
    </div>
</div>
@else
        <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <h2>You are Not Admin</h2>
            </div>
        </div>
      </div>
    </div>
@endif
@endsection
