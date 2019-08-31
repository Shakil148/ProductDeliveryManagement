@extends('layouts.master')

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                <ul class="list-group">
                    @foreach
                        <li class="list-group-item">
                            <span class="badge"></span>
                            <strong></strong>
                            <span class="label label-success"></span>
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs 
                                dropdown-toogle"data-toggle="dropdown">Action <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="http://"></a></li>
                                    <li><a href="http://"></a></li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <strong></strong>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <button type ="button" class="btn btn-success">Checkout</button>
            </div>
        </div>
    @else
    <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3"></div>
                 <h2>No Products in the Cart</h2>
            </div>
        </div>
    @endif


@endsection