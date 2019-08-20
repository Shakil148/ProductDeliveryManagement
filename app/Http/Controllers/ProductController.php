<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use SGFL\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();

        return view('product.index', compact('product'));
    }

    public function changeStatus(Request $request)
    {
        $product = Product::find($request->id);
        $product->status = $request->status;
        $product->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
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
            'name'=>'required',
            'price'=>'required',
            'unit'=>'required',
            'date'=>'required',
            'image'=>'required',
        ]);
        $test = new TestModel([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'unit' => $request->get('unit'),
            'date' => $request->get('date'),
            'image' => $request->get('image'),
        ]);
        return redirect('/product')->with('success', 'User Created!');
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
        $product = Product::find($id);
        return view('product.edit', compact('product'));
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
            'name'=>'required',
            'price'=>'required',
            'unit'=>'required',
            'date'=>'required',
            'image'=>'required',

        ]);
        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->price = $request->get('price');
        $product->unit = $request->get('unit');
        $product->date = $request->get('date');
        $product->image = $request->get('image');
        $product->save();


        return redirect('/product')->with('success', 'User updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = TestModel::find($id);
        $test->delete();

        return redirect('/user')->with('success', 'User deleted!');
    }
}
