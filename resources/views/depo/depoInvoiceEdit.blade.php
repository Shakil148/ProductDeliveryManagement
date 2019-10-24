
<!------ Include the above in your HEAD tag ---------->
@extends('layouts.master')
@section('content')
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container mt-1">
  <div class="row clearfix">
    <div class="col-sm-6 offset-sm-2">

    <h2 class="black white-text text-center bg-info mb-2">Update Delivery DEPO Invoice </h2>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    @if(Session::has('success'))
      <div class="alert alert-success">
          {{Session::get('success')}}
      </div>
    @endif
    <form method="post" class="" action="{{ route('depoInvoice.update', $depoInvoice->id) }}">
          @csrf
        
            <div class="form-group">
              <label for="invoiceNo">Invoice No:</label>
              <input type="text" value="{{$depoInvoice->invoiceNo}}" class="form-control" name="invoiceNo" readonly/>
            </div>
              
            <div class="form-group">
              <label>Date:</label>
              <input type="date" name="date" value="{{$depoInvoice->date}}"  class="form-control" data-format="dd/MM/yyyy" type="text"/>
            </div>

        

        <!-- <div class="form-group mb-2">
            <label for="address">Order No:</label>
            <input type="text" class="col-md-3" name="orderNo"/>
        </div> -->

      <div class="form-group ">
            <label for="truckNo">Truck No:</label>
            <input type="text" value="{{$depoInvoice->truckNo}}" class="form-control" name="truckNo"/>
      </div>
      <div class="form-group ">
            <label for="driverName">Driver Name:</label>
            <input type="text" value="{{$depoInvoice->driverName}}" class="form-control" name="driverName"/>
      </div>      
      <div class="form-group ">
            <label for="driverMobile">Driver Mobile:</label>
            <input type="text" value="{{$depoInvoice->driverMobile}}" class="form-control" name="driverMobile"/>
      </div>
      <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control mb-3"  rows="3" id="comment" name="comment">{{ $depoInvoice->comment}}</textarea>
      </div>
      <button onclick="return confirm('Will you Sure To Update Invoice Information?')"type="submit" class="btn btn-success mb-5">Update</button>
    </form>
    </div>
  </div>

      </table>
    </div>
  </div>
  <!-- <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Grand Total</th>
            <th class="text-center">Remain Order Unit</th>
            <th class="text-center">Remain Balance</th>
          </tr>
          <tr>
            <td><input type="number" class="form-group" name='totalPrice' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
            <td><input type="number" class="form-group" name='remainUnit' placeholder='0.00' value="" class="form-control" readonly/></td>
            <td><input type="number" class="form-group" name='remainBalance' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr>
          <!-- <tr>
            <th class="text-center">Tax</th>
            <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                <input type="number" class="form-control" id="tax" placeholder="0">
                <div class="input-group-addon">%</div>
              </div></td>
          </tr>
          <tr>
            <th class="text-center">Tax Amount</th>
            <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
          </tr> -->
        </tbody>
      </table>
      <!-- <button type="submit" class="btn btn-primary mb-5">Add Invoice</button> -->
    <!-- </form>
    </div>
  </div> -->
</div>

<!-- // Invoice javascript  -->

<script>
    $( function() {
        $('.date').datepicker(); 
        format: 'dd/mm/yy'       
    });
</script>
<script>
function product(){
$('.product-type').click(function() {
  var price = $(this).find(':selected').data('price');
     $(this).parent().parent().find('.price')
.val(price);
calc();
});
}
$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++; 
        
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});
	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();
    product();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});
	
});
function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var freeUnit = $(this).find('.freeUnit').val();
			$(this).find('.totalUnit').val(+qty + +freeUnit);
			var price = $(this).find('.price').val();
			$(this).find('.total').val((qty*price).toFixed(2));
			
			calc_total();
		}
    });
}
function calc_total()
{
	totalUnit=0;
	$('.totalUnit').each(function() {
        totalUnit += parseFloat($(this).val());
    });
	total=0;
	$('.total').each(function() {
        total += parseFloat($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
  $('#sub_grand_total').val(totalUnit.toFixed(2));
}

</script>

@endsection