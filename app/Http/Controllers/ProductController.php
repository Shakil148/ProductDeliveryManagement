<?php

namespace SGFL\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Auth;
use SGFL\Product;
use Image;

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
        ]);

        //$cover = $request->file('image');
       // $extension = $cover->getClientOriginalExtension();
        //Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        
        
        $product = new Product([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'unit' => $request->get('unit'),
            'date' => $request->get('date'),
        ]);
        //$product->mime = $cover->getClientMimeType();
        //$product->original_filename = $cover->getClientOriginalName();
        //$product->filename = $cover->getFilename().'.'.$extension;
        if ($request->hasfile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/') . $filename;
            Image::make($image)->save($location);
            $product->image = $filename;
          }
        $product->save();
        return redirect('/product')->with('success', 'Product Created!');
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
            'image'=>'required',

        ]);
        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->price = $request->get('price');
        $product->unit = $request->get('unit');
        $product->date = $request->get('date');
        
        if ($request->hasfile('image')) {
            Storage::delete($product->image);
    
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/') . $filename;
    
            Image::make($image)->save($location);
    
            $product->image = $filename;
          }
        $product->save();


        return redirect('/product')->with('success', 'Product updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/product')->with('success', 'Product deleted!');
    }
}
