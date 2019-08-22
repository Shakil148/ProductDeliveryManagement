<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\MainWarehouse;
use SGFL\Product;

class MainWarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = MainWarehouse::all();

        return view('mainwarehouse.index',compact('test'))
        ->with('product', Product::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $test = MainWarehouse::with('Product');
        $product = Product::all();
        return view('mainwarehouse.create',compact('test','product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required',
            'productId'=>'required',
            'discount'=>'required',
        ]);
        $mainWarehouse = new MainWarehouse([
            'date' => $request->get('date'),
            'address' => $request->get('address'),
            'amount' => $request->get('amount'),
            'productId' => $request->get('productId'),
            'discount' => $request->get('discount'),
        ]);
        $mainWarehouse->save();
        return redirect('/mainwarehouse')->with('success', 'MainWarehouse Created!');
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
        $mainWarehouse = MainWarehouse::find($id);
        return view('mainwarehouse.edit', compact('mainWarehouse'))
        ->with('product', Product::all());
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
        $request->validate([
            'address' => $request->get('address'),
            'amount' => $request->get('amount'),
            'productId' => $request->get('productId'),
            'discount' => $request->get('discount'),

        ]);
        $mainWarehouse = MainWarehouse::find($id);
        $mainWarehouse->date =  $request->get('date');
        $mainWarehouse->address =  $request->get('address');
        $mainWarehouse->amount = $request->get('amount');
        $mainWarehouse->discount = $request->get('discount');
        $mainWarehouse->save();


        return redirect('/mainwarehouse')->with('success', 'MainWarehouse updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mainWarehouse = MainWarehouse::find($id);
        $mainWarehouse->delete();

        return redirect('/mainwarehouse')->with('success', 'Data deleted!');
    }
}
