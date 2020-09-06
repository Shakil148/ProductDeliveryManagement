<?php

namespace SGFL\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Auth;
use SGFL\Product;
use SGFL\MainWarehouse;
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
        $product = Product::orderBy('created_at', 'desc')->get();

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
    public function productCreate($id)
    {
        $product = Product::find($id);   
        return view('product.productStore', compact('product'));
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
            'image'=>'image|required',
            'status'=>'required',
        ]);

        //$cover = $request->file('image');
       // $extension = $cover->getClientOriginalExtension();
        //Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
        
        
        $product = new Product([
            'name' => $request->get('name'),
            'price' => $request->get('price'),
            'unit' => $request->get('unit'),
            'date' => $request->get('date'),
            'status' => $request->get('status'),
            'image' => $request->image->getClientOriginalName(),
            
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
        if ($request->hasFile('image')) {
            $image = $request->image;
            $image->move('images', $image->getClientOriginalName());
        }
        $product->userName = Auth::user()->name;
        $product->save();
        return redirect('/product')->with('success', 'Product Created!');
    }
    public function productStore(Request $request, $id)
    {
        
        $request->validate([
            'address'=>'required',
            'amount'=>'required',
            'discount'=>'required',
            ]);
        $product = Product::find($id);   
        $mainwarehouse = new MainWarehouse;
        $mainwarehouse->productId =  $id;
        $mainwarehouse->date =  $request->get('date');
        $mainwarehouse->address =  $request->get('address');
        $mainwarehouse->amount = $request->get('amount');
        $mainwarehouse->discount = $request->get('discount');
        $mainwarehouse->userName = Auth::user()->name;
        $mainwarehouse->save();
        $product->totalStock += $request->get('amount');
        $product->save();

        return redirect()->back()->with('success','Product Stored successfully');
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
            'status'=>'required',

        ]);
        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->price = $request->get('price');
        $product->unit = $request->get('unit');
        $product->date = $request->get('date');
        $product->status = $request->get('status');
        $product->totalStock = $request->get('totalStock');

        if ($request->hasFile('image')) {
            // Check if the old image exists inside folder
            if (file_exists(public_path('images/') . $product->image)) {
                unlink(public_path('images/') . $product->image);
            }

            // Upload the new image
            $image = $request->image;
            $image->move('images', $image->getClientOriginalName());

            $product->image = $request->image->getClientOriginalName();
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
