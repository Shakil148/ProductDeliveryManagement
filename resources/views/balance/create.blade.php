@extends('layouts.master')

@section('content')
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

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
            <div class="input-append date">
              <input type="date_format" name="date"  class="form-control" data-format="dd/MM/yyyy" type="text" />
            </div>
          </div>
          <div class="form-group">    
              <label for="status">Status:</label>
                <select id='status' name='status' class="form-control">
                <option value=''>-- Select Status --</option>
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
<script>
    $( function() {
        $('.date').datepicker(); 
        format: 'dd/mm/yy'       
    });
</script>