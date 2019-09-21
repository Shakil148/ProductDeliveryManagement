@extends('layouts.master') 
@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h1 class="display-5 text-center bg-secondary">Update a Distributor</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form class = "mb-5" method="post" action="{{ route('distributor.update', $distributor->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $distributor->name }}" />
            </div>

            <div class="form-group">
                <label for="price">Contact:</label>
                <input type="number" min="0" class="form-control" name="contact" value="{{ $distributor->contact }}" />
            </div>

            <div class="form-group">
                <label for="carNo">Car No:</label>
                <input type="text" class="form-control" name="carNo" value="{{ $distributor->carNo }}" />
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
