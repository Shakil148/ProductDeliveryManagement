@extends('layouts.master') 
@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="row">
    <div class="col-sm-6 offset-sm-2 mt-2">
        <h1 class="display-5 text-center bg-secondary">Update Depo Form</h1>

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
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
        @endif
        <form class = "mb-5" method="post" action="{{ route('depo.update', $depo->id) }}" enctype="multipart/form-data">
            @method('PATCH') 
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $depo->name }}" />
            </div>
            <div class="form-group">
                <label for="name">Address:</label>
                <input type="text" class="form-control" name="address" value="{{ $depo->address }}" />
            </div>
            <div class="form-group">
                <label for="name">Contact:</label>
                <input type="text" class="form-control" name="contact" value="{{ $depo->contact }}" />
            </div>

            <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' class="form-control">
                    <option {{ $depo->status == 'Active' ? 'selected':'' }}>Active</option>
                    <option {{ $depo->status == 'Inactive' ? 'selected':'' }}>Inactive</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
<script>
    $( function() {
        $('.date').datepicker(); 
        format: 'dd/mm/yy'       
    });
</script>