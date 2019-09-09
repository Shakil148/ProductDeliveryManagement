@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2">Payments Details</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('payment.store') }}">
          @csrf
          <div class="form-group">    
              <label for="dealerId">Dealer Name:</label>
                <select id='dealerId' name='dealerId' class="form-control">
                <option value=''>-- Select Dealer --</option>
                @foreach($dealer as $dealerlist)
                    <option value='{{ $dealerlist->id }}'>{{ $dealerlist->name }}</option>
                @endforeach
                </select>
            </div>

          <div class="form-group">    
              <label for="type">Payment Type:</label>
                <select id='type' name='type' class="form-control">
                <option value=''>-- Select Method --</option>
                    <option value='Card'>Card</option>
                    <option value='Cash'>Cash</option>
                    <option value='Bank'>Bank</option>
                </select>
            </div>

          <div class="form-group">
              <label for="accountNo">Account No:</label>
              <input type="number" min="0" class="form-control" name="accountNo"/>
          </div>
          <div class="form-group">
              <label for="accountNo">Bank Name:</label>
              <input type="number" max="30" class="form-control" name="bankName"/>
          </div>
          <div class="form-group">
              <label for="amount">Amount:</label>
              <input type="text" min="0" class="form-control" name="amount"/>
          </div>
          <div class="form-group">
          <label for="date">Date:</label>
            <div id="datetimepicker1" class="input-append date">
              <input type="date_format" name="date"  class="form-control" data-format="dd/MM/yyyy hh:mm:ss" type="text" />
              <span class="add-on">
                <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                </i>
              </span>
            </div>
          </div>
          <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' class="form-control">
                <option value=''>-- Select Method --</option>
                    <option value='Paid'>Paid</option>
                    <option value='Unpaid'>Unpaid</option>
                    <option value='Refund'>Refund</option>
                </select>
            </div>
                      
          <button type="submit" class="btn btn-primary mb-5">Add Payment</button>
      </form>
  </div>
</div>
</div>
@endsection
