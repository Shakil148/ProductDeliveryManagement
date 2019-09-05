  @extends('layouts.master')
   @section('content')
   @include('partials.header')
   @if(Session::has('cart'))
    <div class="container mt-2">
        <div class="row justify-content-center">
            <div class="col-md-16">
                <div class="card">
                <h3 class="display-5 text-center mt-2 ">Ordered Items</h3>
    <table id="dtBasicExample" class="table table-responsive fixed-table-body table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
          <td>#</td>
          <td>Product Name</td>
          <td>Qty</td>
          <td>Unit Price</td>
          <td colspan = 2 class="text-center">Actions</td>
        </tr>
    </thead>
    
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product['item']['name']}}</td>
            <td>{{$product['qty']}}</td>
            <td>{{$product['price']}}</td>
            <td>
                <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i></a>
            </td>
            <td>
                <form onclick="return confirm('Are you sure?')" 
                action="#" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit"><i class="fa fa-minus"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
  </div>


        </div>
    </div>
</div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <strong>Total: {{ $totalPrice }}</strong>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <a href="{{route('warehouses.checkout')}}" type ="button" class="btn btn-success">Confirm Order</a>
            </div>
        </div>
    @else
    <div class="row justify-content-center">
        <div class="col-md-16">
            <div class="card">
            <h3 class="display-5 text-center mt-2 ">Products List</h3>
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <h2>No Products in the Cart</h2>
            </div>
        </div>
      </div>
    </div>
    @endif


@endsection
