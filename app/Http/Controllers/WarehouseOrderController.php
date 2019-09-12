<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Product;
use SGFL\Cart;
use SFGL\Order;
use SFGL\WarehouseOrder;
use SGFL\Dealer;
use Session;
class WarehouseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function order()
    {
        $products = Product::paginate(6);
        return view ('warehouse.order',['products' => $products]);
    }
    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
         return redirect()->route('warehouses.order');
    }

    public function getReduceByOne($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect()->route('warehouses.shoppingcart');
    }
    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
       
        return redirect()->route('warehouses.shoppingcart');
    }
    public function getAddByTen($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addByTen($id);

        Session::put('cart', $cart);
        return redirect()->route('warehouses.shoppingcart');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('warehouse.shoppingcart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('warehouse.shoppingcart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        $dealer = Dealer::all();
        if(!Session::has('cart')){
            return view('warehouse.shoppingcart');
        }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        $total = $cart->totalPrice;
        return view('warehouse.checkout',['total' => $total, 'dealer' => $dealer]);
    }

    public function postCheckout(Request $request){
        if(!Session::has('cart')){
           return view('warehouse.shoppingcart');  
    }
        $oldcart = Session::get('cart');
        $cart = new Cart($oldcart);
        try
        {
            $WarehouseOrder = new warehouseOrder();
            $WarehouseOrder->$orderNo = $request->input('orderNo');
            $WarehouseOrder->$cart = serialize($cart);
            $WarehouseOrder->$date = $request->input('date');
            $WarehouseOrder->$address = $request->input('address');
            $WarehouseOrder->$dealerId = $request->input('dealerId');
            $WarehouseOrder->$paymentId = $request->input('paymentId');
            $WarehouseOrders->save($WarehouseOrder);
        }
        catch(\Exception $e)
        {
            return redirect()->route('warehouses.checkout')->with('error', $e->getMessage());
        }
        Session::forget('cart');
        return redirect()->route('warehouses.order')->with('success','Successfully purchase Order');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
