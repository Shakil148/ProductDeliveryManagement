@extends('layouts.master') 
@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h1 class="display-5 text-center bg-secondary">Update Dealer Form</h1>

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
        <form class = "mb-5" method="post" action="{{ route('dealer.update', $dealer->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $dealer->name }}" />
            </div>

            <div class="form-group">
                <label for="price">Code:</label>
                <input type="text"  class="form-control" name="code" value="{{ $dealer->code }}" />
            </div>
            <div class="form-group">
                <label for="price">Contact:</label>
                <input type="number" min="0" class="form-control" name="contact" value="{{ $dealer->contact }}" />
            </div>

            <div class="form-group">
                <label for="unit">Address:</label>
                <input type="text" class="form-control" name="address" value="{{ $dealer->address }}" />
            </div>
            <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' class="form-control">
                    <option {{ $dealer->status == 'Active' ? 'selected':'' }}>Active</option>
                    <option {{ $dealer->status == 'Inactive' ? 'selected':'' }}>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
