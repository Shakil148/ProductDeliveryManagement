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

        //$test = DB::table('main_warehouses')->where('productId', Product::id())->get();

        $test = MainWarehouse::all();

        return view('mainwarehouse.index',compact('test'))
        ->with('product', Product::all());
        //$product = Product::find($id);
        //$test = MianWarehouse::whereproductId($id)->get(); // or ->paginate(20);
        //return compact('product', 'test');

        //$test = MainWarehouse::where('productId')->with('Product')->get();
       //return view('mainwarehouse.index',compact('test'));

        //$test = MainWarehouse::where('id','=', $id)
    //->leftJoin('Product', 'MainWarehouse.productId', '=', 'product.id')
    //->select('product.id','MainWarehouse.name')->first();
    //return view('mainwarehouse.index',compact('test'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('mainwarehouse.create')
        ->with('product', Product::all());

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
