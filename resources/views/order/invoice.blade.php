
<!------ Include the above in your HEAD tag ---------->
@extends('layouts.master')
@section('content')
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class="container mt-1">
  <div class="row clearfix">
    <div class="col-md-12">

    <h2 class="black white-text text-center bg-info mb-2">Delivery Order Invoice</h2>
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
    <form method="post" class="" action="{{ route('dealer.invoice', $dealer->id) }}">
          @csrf
          <div class="form-group col-md-12 text-center mb-2">    
              <h5 for="dealerId">Dealer Name: <b class="red">{{$dealer->name}}</b></h5>
        </div>
        
            <div class="col-md-9">
              <label for="invoiceNo">Invoice No:</label>
              <input type="text" value="{{$newOrderId}}" class="col-md-2" name="invoiceNo" readonly/>
            </div>
              
            <div class="text-right mb-5">
              <label>Date:</label>
              <input type="date" name="date"  class="col-md-2" data-format="dd/MM/yyyy" type="text" value="{{ old('date')}}"/>
            </div>

        

        <!-- <div class="form-group mb-2">
            <label for="address">Order No:</label>
            <input type="text" class="col-md-3" name="orderNo"/>
        </div> -->
      <table class="table table-bordered table-hover mb-2" id="tab_logic">
        <thead >
          <tr>
            <th class="text-center"> # </th>
            <!-- <th class="text-center"> Invoice No </th>
            <th class="text-center"> Order No </th> -->
            <th class="text-center"> Product </th>
            <th class="text-center"> Invoice Unit</th>
            <th class="text-center"> Free Unit</th>
            <th class="text-center"> Total Unit</th>
            <th class="text-center"> Price </th>
            <th class="text-center"> Total Price </th>
          </tr>
        </thead>
        
        <tbody >
          <tr id='addr0'>
            <td>1</td>
            <!-- <td><input type="text"   name='invoiceNo[]' placeholder='Enter Invoice No' class="form-control"/></td>
            <td><input type="text"   name='orderId[]' placeholder='Enter Order No' class="form-control"/></td> -->
            <td>
            <div class="form-group product-type">
                <select id='product' for="product" name='product[]' class="form-control product">
                  <option disabled selected>-- Select Product --</option>
                  <!-- Read Products -->
                  @foreach($product as $productlist)
                    <option data-price='{{ $productlist->unit }}' data-selected-value="{{ old('$productlist->name') }}">{{ $productlist->name }}</option>
                  @endforeach
                </select>
            </div>
            </td>
            <td><input type="number" name='invoiceUnit[]'     placeholder='Enter Qty' class="form-control qty" step="0" min="0" value="{{ old('invoiceUnit[]')}}"/></td>
            <td><input type="number" name='freeUnit[]'   placeholder='Enter Free Qty' class="form-control freeUnit" step="0" min="0" value="{{ old('freeUnit[]')}}"/></td>
            <td><input type="number" name='totalUnit[]'  placeholder='0.00' class="form-control totalUnit" step="0" min="0" readonly/></td>
            <td>
            <div class="form-group">
              <input type="text" for="price" name='price[]' placeholder='0.00' 
              class="form-control price" readonly/>
            </div>
            </td>
            <td><input type="text" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
          </tr>
          <tr id='addr1'></tr>
        </tbody>
        
        <div class="row clearfix mb-2">
          <div class="col-md-12">
            <a id="add_row" class="btn btn-success pull-left">Add Row</a>
            <a id='delete_row' class=" btn btn-warning ">Delete Row</a>
          </div>
        </div>
        <div class="row clearfix" style="margin-top:20px">
    <div class="pull-right col-md-4">
      <table class="table table-bordered table-hover" id="tab_logic_total">
        <tbody>
          <tr>
            <th class="text-center">Grand Total Unit</th>
            <th class="text-center">Grand Total Price</th>
            <th class="text-center">Remain Order Unit</th>
            <th class="text-center">Remain Balance</th>
          </tr>
          <tr>
            <td><input type="number" class="form-group" name='grandTotalUnit' placeholder='0.00' class="form-control" id="sub_grand_total" readonly/></td>
            <td><input type="text" class="form-group" name='totalPrice' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
            <td><input type="number" class="form-group" name='remainUnit' placeholder='0.00' value="" class="form-control" readonly/></td>
            <td><input type="number" class="form-group" name='remainBalance' id="total_amount" placeholder="{{$dealer->amount}}" class="form-control" readonly/></td>
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
      <div class="form-group ">
            <label for="truckNo">Truck No:</label>
            <input type="text"  class="col-md-2" name="truckNo"/>
            <label for="driverName">Driver Name:</label>
            <input type="text"  class="col-md-3" name="driverName"/>
            <label for="driverMobile">Driver Mobile:</label>
            <input type="text"  class="col-md-3" name="driverMobile"/>
      </div>
      <div class="col-md-3">
        <label for="comment">Comment:</label>
        <textarea class="form-control mb-3" rows="3" id="comment" name="comment"></textarea>
      </div>
      <button onclick="return confirm('Will you Sure To Submit Invoice?')"type="submit" class="btn btn-success mb-5">Add Invoice</button>
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
			$(this).find('.total').val(qty*price);
			
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