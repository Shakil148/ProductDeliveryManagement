<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

            <a style="margin: 19px;" href="{{ route('warehouses.order')}}"><i class=" fas fa-luggage-cart red" aria-hidden="true"></i> Order More</a>


        <!-- Collect the nav links, forms, and other content for toggling -->
  

                <a href="{{route('warehouses.shoppingcart')}}" >
                <i class="fa fa-shopping-cart green" aria-hidden="true"></i> Order Cart
                    <span class ="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span> 
                 </a>
 
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>