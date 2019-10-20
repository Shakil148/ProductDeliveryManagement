@extends('layouts.master') 
@section('content')
@if( ( Auth::user()->role ) == "admin" )
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h1 class="display-5 text-center bg-secondary">Dealers Payment Edit Form</h1>

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
        <form class = "mb-5" method="post" action="{{ route('balance.balanceUpdate', $balanceRecord->id) }}">
            @method('PATCH') 
            @csrf
            
            <div class="form-group text-center">    
              <label for="productId" class="text-center">Dealer Name: <b class="red"> {{ $balanceRecord->dealer->name }}</b></label>
            </div>

            <div class="form-group">
              <label for="paymentNo">Payment No:</label>
              <input type="text" value="{{$balanceRecord->paymentNo}}" class="col-md-3 text-center" name="paymentNo" readonly/>
            </div>

            <div class="form-group">    
              <label for="type">Payment Type:</label>
                <select id='type' name='type' class="form-control">
                    <option {{ $balanceRecord->type == 'Card' ? 'selected':'' }}>Card</option>
                    <option {{ $balanceRecord->type == 'Cash' ? 'selected':'' }}>Cash</option>
                    <option {{ $balanceRecord->type == 'Bank' ? 'selected':'' }}>Bank</option>
                </select>
            </div>

          <div class="form-group">
              <label for="accountNo">Account No:</label>
              <input type="number" min="0" value="{{$balanceRecord->accountNo}}"class="form-control" name="accountNo"/>
          </div>
          <div class="form-group">
              <label for="bankName">Bank Name:</label>
              <input type="text"  class="form-control"value="{{$balanceRecord->bankName}}" name="bankName"/>
          </div>
          <div class="form-group">
              <label for="amount">Amount:</label>
              <input type="number" min="0" class="form-control" value="{{$balanceRecord->amount}}" name="amount"/>
          </div>
          <div class="form-group">
          <label for="date">Date:</label>
            <div class="input-append date">
              <input type="date" name="date" value="{{$balanceRecord->date}}" class="form-control" data-format="dd/MM/yyyy" type="text" />
            </div>
          </div>
          <div class="form-group">    
              <label for="type">Payment Status:</label>
                <select id='type' name='status' class="form-control">
                    <option {{ $balanceRecord->status == 'paid' ? 'selected':'' }}>Paid</option>
                    <option {{ $balanceRecord->status == 'unpaid' ? 'selected':'' }}>Unpaid</option>
                    <option {{ $balanceRecord->status == 'refund' ? 'selected':'' }}>Refund</option>
                </select>
            </div>
          <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control mb-3" rows="3" id="comment" name="comment">{{$balanceRecord->comment}}</textarea>
      </div>
            <button onclick="return confirm('Will you Sure To Update Payment Information?')" type="submit" class="btn btn-primary">Update</button>
        </form>
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
<script>
    $( function() {
        $('.date').datepicker(); 
        format: 'dd/mm/yy'       
    });
</script>