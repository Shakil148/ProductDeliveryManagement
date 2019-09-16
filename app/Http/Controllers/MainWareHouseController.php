<?php

namespace SGFL\Http\Controllers;
use SGFL\validator;
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
        $mainwarehouse = \DB::table('main_warehouses')
            ->join('products', 'main_warehouses.productId', '=', 'products.id')
            ->select('main_warehouses.*', 'products.name', 'products.price', 'products.unit', 'products.image')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('mainwarehouse.index',compact('mainwarehouse'));
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
            'address'=>'required',
            'amount'=>'required',
            'productId'=>'required',
            'discount'=>'required',
        ]);
        $mainwarehouse = new MainWarehouse([
            'date' => $request->get('date'),
            'address' => $request->get('address'),
            'amount' => $request->get('amount'),
            'productId' => $request->get('productId'),
            'discount' => $request->get('discount'),
        ]);
        $mainwarehouse->save();
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
        $mainwarehouse = MainWarehouse::find($id);
        $mainwarehouse_new = \DB::table('main_warehouses')
        ->join('products', 'main_warehouses.productId', '=', 'products.id')
        ->select('main_warehouses.*', 'products.name')
        ->get();
        return view('mainwarehouse.edit', compact('mainwarehouse','mainwarehouse_new'));
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
            'address'=>'required',
            'amount'=>'required',
            'productId'=>'required',
            'discount'=>'required',

        ]);
        $mainwarehouse = MainWarehouse::find($id);
        $mainwarehouse->date =  $request->get('date');
        $mainwarehouse->address =  $request->get('address');
        $mainwarehouse->amount = $request->get('amount');
        $mainwarehouse->discount = $request->get('discount');
        $mainwarehouse->save();


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
        $mainwarehouse = MainWarehouse::find($id);
        $mainwarehouse->delete();

        return redirect('/mainwarehouse')->with('success', 'Data deleted!');
    }
}
