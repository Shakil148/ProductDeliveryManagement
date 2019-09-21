@extends('layouts.master')

@section('content')
<div class="row">
 <div class="col-sm-6 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-secondary">Payments Record</h1>
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
      <form method="post" action="{{ route('balance.store') }}">
          @csrf


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
              <label for="bankName">Bank Name:</label>
              <input type="text"  class="form-control" name="bankName"/>
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
          <div class="form-group">
              <label for="comment">Comment:</label>
              <input type="textarea" class="form-control" name="comment"/>
          </div>
                      
          <button type="submit" class="btn btn-primary mb-5">Add Payment</button>
      </form>
  </div>
</div>
</div>
@endsection
