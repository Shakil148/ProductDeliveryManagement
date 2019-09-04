<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>ProductDeliveryManagementSystem</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="/css/app.css">
  <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
  <link href="{{asset('frontend/css/jquery.dataTables.min.css')}}" rel="stylesheet">

  
  

  </head>
<body class="hold-transition sidebar-mini">
  <script src="{{ asset('js/app.js') }}" ></script>
  <script src="{{asset('frontend/js/bootstrap.min.js')}}" ></script>
  <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}" ></script>
  <script src="{{asset('frontend/js/jquery.js')}}" ></script>
  <script src="{{asset('frontend/js/jquery-1.10.2.min.map')}}" ></script>
  <script src="{{asset('frontend/js/jquery.dataTables.js')}}" ></script>

<div class="wrapper" id="app">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">

  <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
     
    </ul>
    
    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

 
  </nav>
  <!-- /.navbar -->
  

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/1567415894.png') }}" alt="SGFL Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SGFL Logo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" class="img-circle elevation-2" alt="{{ asset('images/1567415894.png') }}">
        </div>
        <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <router-link to="/dashboard" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt blue"></i>
                  <p>
                    Dashboard
                  </p>
            </router-link>
          </li>  
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog green"></i>
              <p>
                Management
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('user')}}"  class="nav-link">
                  <i class="fa fa-users nav-icon purple"></i>
                  <p>Users</p>
                </a>
              </li>
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                <i class="nav-icon fas fa-truck-moving teal"></i>
                <p>
                  Invoice
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{URL::to('user')}}"  class="nav-link">
                    <i class="nav-icon fas fa-warehouse ash"></i>
                    <p>Warehouse</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{URL::to('user')}}"  class="nav-link">
                    <i class="fas fa-user-tie nav-icon cyan"></i>
                    <p>Dealer</p>
                  </a>
                </li>
              </ul>
          </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('product')}}" class="nav-link ">
              <i class="nav-icon fas fa-cart-plus pink"></i>
              <p>
                Product
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-warehouse ash"></i>
              <p>
                Warehouse
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('mainwarehouse')}}"  class="nav-link">
                  <i class="nav-icon fas fa-warehouse pink "></i>
                  <p>Main Warehouse</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('localwarehouse')}}"  class="nav-link">
              <i class="nav-icon fas fa-warehouse teal "></i>
              <p>Local Warehouse</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('dealer')}}"  class="nav-link">
              <i class="fas fa-user-tie nav-icon cyan"></i>
              <p>Dealer</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-luggage-cart red"></i>
              <p>
                Order
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{URL::to('localwarehouseorder')}}"  class="nav-link">
                  <i class="nav-icon fas fa-warehouse teal"></i>
                  <p>Local Warehouse</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{URL::to('user')}}"  class="nav-link">
                  <i class="fas fa-user-tie nav-icon cyan"></i>
                  <p>Dealer</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="{{URL::to('distributor')}}" class="nav-link ">
              <i class="nav-icon fas fa-people-carry teal"></i>
              <p>
                Distributor
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{URL::to('payment')}}" class="nav-link ">
              <i class="nav-icon fas fa-money-check-alt yellow"></i>
              <p>
                Payment
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-power-off red"></i>
              <p>
               {{ __('Logout') }}
              </p>
            </a >
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid ">
          @yield('content')
      </div>
      <main class="py-4">
           
      </main><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Main Footer -->
  <footer class="main-footer fixed-bottom">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2018-2019 <a href="#">Sultan Global Food Limited</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


<script>
// Basic example
$(document).ready(function () {
  $('#dtBasicExample').DataTable({
    "paging": true // false to disable pagination (or any other option)
  });
  $('.dataTables_length').addClass('bs-select');
});
</script>
<script type="text/javascript">
  $(function() {
    $('#datetimepicker1').datetimepicker({
      language: 'pt-BR'
    });
  });
</script>


</body>

</html>


