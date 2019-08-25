<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Dealer;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealer = Dealer::all();

        return view('dealer.index', compact('dealer'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dealer.create');
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
            'contact'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);
        $dealer = new Dealer([
            'name' => $request->get('name'),
            'contact' => $request->get('contact'),
            'address' => $request->get('address'),
            'status' => $request->get('status'),
        ]);
        $dealer->save();
        return redirect('/dealer')->with('success', 'Dealer Created!');
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
        $dealer = Dealer::find($id);
        return view('dealer.edit', compact('dealer'));
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
            'contact'=>'required',
            'address'=>'required',
            'status'=>'required',

        ]);
        $dealer = Product::find($id);
        $dealer->name =  $request->get('name');
        $dealer->contact = $request->get('contact');
        $dealer->address = $request->get('address');
        $dealer->status = $request->get('status');
        $dealer->save();


        return redirect('/dealer')->with('success', 'Dealer updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dealer = Dealer::find($id);
        $dealer->delete();

        return redirect('/dealer')->with('success', 'Dealer deleted!');
    }
}

