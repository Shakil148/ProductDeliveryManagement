@extends('layouts.master')

@section('content')
    <div class="row mt-3 mb-3">
        <div class="col-sm-6 col-md-4"> 
            <div class="thumbnail">
         @foreach($product as $productlist)
            <img src="{{ asset('images/' . $productlist->image) }}" width="150" height="150" alt="{{ $productlist->title }} photo" class="img-responsive">
                <div class="caption mt-1">
                    <h3>{{$productlist->name}}</h3>
                    <p class="description"><b>Description</b>: Delicious healthy product makes you stronger</p>
                    <div class="clearfix mb-2">
                        <div class="pull-left price"><b>Price</b>: {{$productlist->price}} tk</div>
                        <a href="#" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
          @endforeach
           
            </div>
        </div>
    </div   


@endsection