<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Dealer;
use SGFL\DealerInvoice;
use SGFL\DealerInvoiceDetail;
class OrderController extends Controller
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

    public function orderInvoice($id)
    {
        $dealer = Dealer::find($id);
        return view('order.invoice', compact('dealer'));
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

    public function dealerInvoice(Request $request,$id){
        // $request->validate([
        //     // 'name'=>'required',
        //     // 'price'=>'required',
        //     // 'unit'=>'required',
        //     // 'image'=>'required',
        // ]);

        $dealer = Dealer::find($id);
        $dealerInvoice = new DealerInvoice;
        $dealerInvoice->dealerId =$id;
        $dealerInvoice->save();
        $data=$request->all();
        $lastid= DealerInvoice::create($data)->id;
        $dealer->amount -= $request->get('totalPrice');
        $dealer->save();
        if(count($request->product) > 0)
        {
        foreach($request->product as $i=>$v){
            $data2=array(
                'dealerInvoiceId'=>$lastid,
                // 'product_name'=>$request->product_name[$item],
                // 'brand'=>$request->brand[$item],
                // 'quantity'=>$request->quantity[$item],
                // 'budget'=>$request->budget[$item],
                // 'amount'=>$request->amount[$item],
                'product' => $request->product[$i],
                'productId' => $request->productId[$i],
                'price' => $request->price[$i],
                'invoiceUnit' => $request->invoiceUnit[$i],
                'freeUnit' => $request->freeUnit[$i],
                'totalUnit' => $request->totalUnit[$i],
            );
        DealerInvoiceDetail::insert($data2);
      }
        }
        return redirect()->back()->with('success','Invoice insert successfully');
    }
    
        // for($i = 0; $i < 100; ++$i){
    
        //     $dealerInvoice = new DealerInvoice;
        //     $dealerInvoice->orderId = $request->orderId;
        //     $dealerInvoice->dealerId = $request->dealerId;
        //     $dealerInvoice->invoiceNo = $request->invoiceNo[$i];
        //     $dealerInvoice->productId = $request->productId[$i];
        //     $dealerInvoice->invoiceUnit = $request->invoiceUnit[$i];
        //     $dealerInvoice->freeUnit = $request->freeUnit[$i];
        //     $dealerInvoice->totalUnit = $request->totalUnit[$i];
        //     $dealerInvoice->totalPrice = $request->totalPrice;
        //     $dealerInvoice->remainUnit = $request->remainUnit;
        //     $dealerInvoice->remainBalance = $request->remainBalance;
        //     $dealerInvoice->save();
        // }
        // $dealerInvoice = new DealerInvoice([
        //     'invoiceNo' => $request->get('invoiceNo'),
        //     'orderId' => $request->get('orderId'),
        //     'productId' => $request->get('productId'),
        //     'invoiceUnit' => $request->get('invoiceUnit'),
        //     'freeUnit' => $request->get('freeUnit'),
        //     'totalUnit' => $request->get('totalUnit'),
        //     'totalPrice' => $request->get('totalPrice'),
        //     'remainUnit' => $request->get('remainUnit'),
        //     'remainBalance' => $request->get('remainBalance'),
        // ]);
  
        // $dealerInvoice->save();
       //return redirect('/dealerinvoice')->with('success', 'Invoice Created!');
    


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
