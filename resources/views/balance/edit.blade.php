@extends('layouts.master') 
@section('content')
<div class="row">
    <div class="col-sm-6 offset-sm-2">
        <h1 class="display-5 text-center">Update Dealers Payment</h1>

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
        <form class = "mb-5" method="post" action="{{ route('balance.update', $balance->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
              <label for="dealerId">Dealer Name:</label>
                <select id='dealerId' name='dealerId' class="form-control">
                @foreach($payment_new as $paymentlist)
                <option value='{{$paymentlist->dealerId}}'>{{  $balance->id == $balance->dealerId ? 'selected': $paymentlist->name}}</option>
                @endforeach
                </select>
            </div>

            <div class="form-group">    
              <label for="type">Pyment Type:</label>
                <select id='type' name='type' class="form-control">
                    <option {{ $payment->type == 'Card' ? 'selected':'' }}>Card</option>
                    <option {{ $payment->type == 'Cash' ? 'selected':'' }}>Cash</option>
                    <option {{ $payment->type == 'Bank' ? 'selected':'' }}>Bank</option>
                </select>
            </div>

            <div class="form-group">
                <label for="accountNo">Account No:</label>
                <input type="number" min="0" class="form-control" name="accountNo" value="{{ $balance->accountNo }}" />
            </div>
            <div class="form-group">
                <label for="bankName">Bank Name:</label>
                <input type="text" class="form-control" name="bankName" value="{{ $balance->bankName }}" />
            </div>
            <div class="form-group">
                <label for="amount">Amount:</label>
                <input type="number" min="0" class="form-control" name="amount" value={{ $balance->amount }} />
            </div>
            <div id="datetimepicker1" class="input-append date">
                <label for="date">Date:</label>
                <input type="date_format" name="date" class="form-control" value="{{ $balance->date }}" />
                <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
                </span>
            </div>
            <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' class="form-control">
                    <option {{ $payment->status == 'Paid' ? 'selected':'' }}>Paid</option>
                    <option {{ $payment->status == 'Unpaid' ? 'selected':'' }}>Unpaid</option>
                    <option {{ $payment->status == 'Refund' ? 'selected':'' }}>Refund</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comment">Comment:</label>
                <input type="textarea"  class="form-control" name="comment" value={{ $balance->amount }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
