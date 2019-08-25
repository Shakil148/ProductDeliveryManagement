<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Distributor;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distributor = Distributor::all();

        return view('distributor.index', compact('distributor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distributor.create');
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
            'carNo'=>'required',
        ]);
        $distributor = new Distributor([
            'name' => $request->get('name'),
            'contact' => $request->get('contact'),
            'carNo' => $request->get('carNo'),
        ]);
        $distributor->save();
        return redirect('/distributor')->with('success', 'Distributor Created!');
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
        $distributor = Distributor::find($id);
        return view('distributor.edit', compact('distributor'));
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
            'carNo'=>'required',

        ]);
        $distributor = Distributor::find($id);
        $distributor->name =  $request->get('name');
        $distributor->contact = $request->get('contact');
        $distributor->carNo = $request->get('carNo');
        $distributor->save();


        return redirect('/distributor')->with('success', 'Distributor updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $distributor = Distributor::find($id);
        $distributor->delete();

        return redirect('/distributor')->with('success', 'Distributor deleted!');
    }
}
