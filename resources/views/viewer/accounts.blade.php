@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <h2 class="text-center">Hello <b class="green">{{ Auth::user()->name }}</b></h2>
            <h2 class="text-center">You are Logged in as <b class="red">Accounts</b></h2>

            </div>
        </div>
    </div>
</div>
@endsection
