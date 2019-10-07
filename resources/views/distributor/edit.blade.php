@extends('layouts.master') 
@section('content')
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-5 text-center bg-dark mt-2">Update Depo Cost Form</h1>

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
        <form class = "mb-5" method="post" action="{{ route('distributor.update', $distributor->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">    
                <label for="name">Invoice Numbers:</label>
                <input type="text" class="form-control" name="invoiceNo" value="{{ $distributor->invoiceNo}}"/>
            </div>
            <div class="form-group">
            <label for="date">Date:</label>
                <div id="datetimepicker1" class="input-append date">
                <input type="date" name="date"  class="form-control" data-format="dd/MM/yyyy" type="text" value="{{ $distributor->date}}"/>
                </div>
            </div>
            <div class="form-group">    
                <label for="name">Driver Name:</label>
                <input type="text" class="form-control" name="driverName" value="{{ $distributor->driverName}}"/>
            </div>
            <div class="form-group">    
                <label for="name">Helper Name:</label>
                <input type="text" class="form-control" name="helperName" value="{{ $distributor->helperName}}"/>
            </div>
            <div class="form-group">
                <label for="contact">Driver Contact:</label>
                <input type="number" min="0" class="form-control" name="contact" value="{{ $distributor->contact}}"/>
            </div>
            <div class="form-group">
                <label for="carNo">Car No:</label>
                <input type="text"  class="form-control" name="carNo" value="{{ $distributor->carNo}}"/>
            </div>
            <div class="form-group">
                <label for="locationStart">Location Start:</label>
                <input type="text"  class="form-control" name="locationStart" value="{{ $distributor->locationStart}}"/>
            </div>
            <div class="form-group">
                <label for="locationEnd">Location End:</label>
                <input type="text"  class="form-control" name="locationEnd" value="{{ $distributor->locationEnd}}"/>
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
                <td><input type="number" name='kplCost'     placeholder='Enter kplCost' class="form-control price1" step="0" min="0" value="{{ $distributor->kplCost}}"/></td>
                <td><input type="number" name='policeCost'   placeholder='Enter policeCost' class="form-control price2" step="0" min="0" value="{{ $distributor->policeCost}}"/></td>
                <td><input type="number" name='foodAllowanceCost'   placeholder='Enter foodAllowanceCost' class="form-control price3" step="0" min="0" value="{{ $distributor->foodAllowanceCost}}"/></td>
                <td><input type="number" name='maintainingCost'   placeholder='Enter maintainingCost' class="form-control price4" step="0" min="0" value="{{ $distributor->maintainingCost}}"/></td>
                <td><input type="number" name='tollCost'   placeholder='Enter tollCost' class="form-control price5" step="0" min="0" value="{{ $distributor->tollCost}}"/></td>
                <td><input type="number" name='othersCost'   placeholder='Enter othersCost' class="form-control price6" step="0" min="0" value="{{ $distributor->othersCost}}"/></td>
                <td><input type="number" name='totalCost'  placeholder='0.00' class="form-control total" step="0" min="0" value="{{ $distributor->totalCost}}" readonly/></td>
                <td>
            </tr>
            </tbody>
            </table> 
            <button type="submit" onclick="return confirm('Will you Sure To Update Depo Cost?')" class="btn btn-primary">Update Cost</button>
        </form>
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
