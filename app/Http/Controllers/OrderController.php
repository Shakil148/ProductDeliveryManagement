<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Dealer;
use SGFL\DealerInvoice;
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

    public function orderInvoice()
    {
        $dealer = Dealer::all();
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

    public function dealerInvoice(Request $request){
        $request->validate([
            // 'name'=>'required',
            // 'price'=>'required',
            // 'unit'=>'required',
            // 'image'=>'required',
        ]);

    //     $cover = $request->file('image');
    //    $extension = $cover->getClientOriginalExtension();
    //     Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        
        
        $dealerInvoice = new DealerInvoice([
            'invoiceNo' => $request->get('invoiceNo'),
            'orderId' => $request->get('orderId'),
            'productId' => $request->get('productId'),
            'invoiceUnit' => $request->get('invoiceUnit'),
            'freeUnit' => $request->get('freeUnit'),
            'totalUnit' => $request->get('totalUnit'),
            'totalPrice' => $request->get('totalPrice'),
            'remainUnit' => $request->get('remainUnit'),
            'remainBalance' => $request->get('remainBalance'),
        ]);
        //$product->mime = $cover->getClientMimeType();
        //$product->original_filename = $cover->getClientOriginalName();
        //$product->filename = $cover->getFilename().'.'.$extension;
        // if ($request->hasfile('image')) {
        //     $image = $request->file('image');
        //     $filename = time() . '.' . $image->getClientOriginalExtension();
        //     $location = public_path('images/') . $filename;
        //     Image::make($image)->save($location);
        //     $product->image = $filename;
        //   }
        $dealerInvoice->save();
        return redirect('/dealerinvoice')->with('success', 'Product Created!');
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
