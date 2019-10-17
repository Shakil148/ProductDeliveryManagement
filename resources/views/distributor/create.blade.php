@extends('layouts.master')

@section('content')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<div class="row">
 <div class="col-md-8 offset-sm-2">
    <h1 class="display-5 text-center mt-2 bg-dark">New Distribution Cost Form</h1>
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
    @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
    @endif
      <form method="post" action="{{ route('distributor.store') }}" id="tab_logic">
          @csrf
          <div class="form-group">    
              <label for="name">Invoice Numbers:</label>
              <input type="text" class="form-control" name="invoiceNo" value="{{ old('invoiceNo')}}"/>
          </div>
          <div class="form-group">
          <label for="date">Date:</label>
            <div class="input-append date">
              <input type="date" name="date"  class="form-control" data-format="dd/MM/yyyy" type="text" value="{{ old('date')}}"/>
            </div>
          </div>
          <div class="form-group">    
              <label for="name">Driver Name:</label>
              <input type="text" class="form-control" name="driverName" value="{{ old('driverName')}}"/>
          </div>
          <div class="form-group">    
              <label for="name">Helper Name:</label>
              <input type="text" class="form-control" name="helperName" value="{{ old('helperName')}}"/>
          </div>
          <div class="form-group">
              <label for="contact">Driver Contact:</label>
              <input type="number" min="0" class="form-control" name="contact" value="{{ old('contact')}}"/>
          </div>
          <div class="form-group">
              <label for="carNo">Car No:</label>
              <input type="text"  class="form-control" name="carNo" value="{{ old('carNo')}}"/>
          </div>
          <div class="form-group">
              <label for="locationStart">Location Start:</label>
              <input type="text"  class="form-control" name="locationStart" value="{{ old('locationStart')}}"/>
          </div>
          <div class="form-group">
              <label for="locationEnd">Location End:</label>
              <input type="text"  class="form-control" name="locationEnd" value="{{ old('locationEnd')}}"/>
          </div>
          <table class="form-group mb-3" id="tab_logic">
        <thead >
          <tr>
            <th class="text-center"> KPL Cost</th>
            <th class="text-center"> Police Cost</th>
            <th class="text-center"> Food Allowance Cost</th>
            <th class="text-center"> Maintaining Cost</th>
            <th class="text-center"> Toll Cost</th>
            <th class="text-center"> Others Cost</th>
            <th class="text-center"> Total Cost</th>
          </tr>
        </thead>
        
        <tbody >
          <tr>
            <td><input type="number" name='kplCost'     placeholder='Enter kplCost' class="form-control price1" step="0" min="0" value="{{ old('kplCost')}}"/></td>
            <td><input type="number" name='policeCost'   placeholder='Enter policeCost' class="form-control price2" step="0" min="0" value="{{ old('policeCost')}}"/></td>
            <td><input type="number" name='foodAllowanceCost'   placeholder='Enter foodAllowanceCost' class="form-control price3" step="0" min="0" value="{{ old('foodAllowanceCost')}}"/></td>
            <td><input type="number" name='maintainingCost'   placeholder='Enter maintainingCost' class="form-control price4" step="0" min="0" value="{{ old('maintainingCost')}}"/></td>
            <td><input type="number" name='tollCost'   placeholder='Enter tollCost' class="form-control price5" step="0" min="0" value="{{ old('tollCost')}}"/></td>
            <td><input type="number" name='othersCost'   placeholder='Enter othersCost' class="form-control price6" step="0" min="0" value="{{ old('othersCost')}}"/></td>
            <td><input type="number" name='totalCost'  placeholder='0.00' class="form-control total" step="0" min="0" value="{{ old('totalCost')}}" readonly/></td>
            <td>
          </tr>
        </tbody>
        </table>                
          <!-- <div class="form-group">
              <label for="kplCost">KPL Cost:</label>
              <input type="number"  class="form-control prc" name="kplCost" value="{{ old('kplCost')}}"/>
          </div>
          <div class="form-group">
              <label for="policeCost">Police Cost:</label>
              <input type="number"  class="form-control prc" name="policeCost" value="{{ old('policeCost')}}"/>
          </div>
          <div class="form-group">
              <label for="foodAllowanceCost">Food Allowance Cost:</label>
              <input type="number"  class="form-control prc" name="foodAllowanceCost" value="{{ old('foodAllowanceCost')}}"/>
          </div>
          <div class="form-group">
              <label for="maintainingCost">Maintaining Cost:</label>
              <input type="number"  class="form-control prc" name="maintainingCost" value="{{ old('maintainingCost')}}"/>
          </div>
          <div class="form-group">
              <label for="tollCost">Toll Cost:</label>
              <input type="number"  class="form-control qty" name="tollCost" value="{{ old('tollCost')}}"/>
          </div>
          <div class="form-group">
              <label for="othersCost">Others Cost:</label>
              <input type="number" class="form-control qty1" name="othersCost" value="{{ old('othersCost')}}"/>
          </div>
          <div class="form-group">
              <label for="totalCost">Total Cost:</label>
              <input type="number" class="form-control totalUnit" name="totalCost" placeholder="0.0" readonly/>
          </div> -->
                       
          <button type="submit" onclick="return confirm('Will you Sure To Submit Depo Cost?')" class="btn btn-primary mb-5">Add Cost </button>
      </form>
  </div>
</div>
</div>

<script>

$(document).ready(function(){

	
	$('#tab_logic tbody').on('keyup change',function(){
		calc();

	});

	
});
function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var price1 = $(this).find('.price1').val();
			var price2 = $(this).find('.price2').val();
			var price3 = $(this).find('.price3').val();
			var price4 = $(this).find('.price4').val();
			var price5 = $(this).find('.price5').val();
			var price6 = $(this).find('.price6').val();
			$(this).find('.total').val(+price1 + +price2 + +price3 + +price4 + +price5 + +price6);
			
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

}


</script>
@endsection

