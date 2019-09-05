
@extends('layouts.master')

@section('content')
@include('partials.header')
    @foreach($products->chunk(3) as $product)
    <div style="margin: 19px;" class="row mt-3 mb-3">
         @foreach($product as $productlist)
        <div class="col-sm-6 col-md-4"> 
            <div class="thumbnail">
            <img src="{{ asset('images/' . $productlist->image) }}" width="120" height="120" alt="{{ $productlist->title }} photo" class="img-responsive">
                <div class="caption mt-1">
                    <h3>{{$productlist->name}}</h3>
                    <p class="description"><b>Description</b>: Delicious healthy product makes you stronger</p>
                    <div class="clearfix mb-2">
                        <div class="pull-left price"><b>Price</b>: {{$productlist->price}} tk</div>
                        <a href="{{route('warehouses.addtocart',['id' => $productlist->id])}}" class="btn btn-success pull-right" role="button">Add to Cart</a>
                    </div>
                </div>
           
            </div>
        </div>
        @endforeach
    </div>   

    @endforeach
    {{$products->links()}}
@endsection