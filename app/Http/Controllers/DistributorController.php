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
        $distributor = Distributor::orderBy('created_at', 'desc')->paginate(8);

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
            'invoiceNo'=>['required', 'unique:distributors'],
            'date'=>'required',
            'driverName'=>'required',
            'contact'=>'required',
            'carNo'=>'required',
        ]);
        $distributor = new Distributor([
            'invoiceNo' => $request->get('invoiceNo'),
            'date' => $request->get('date'),
            'driverName' => $request->get('driverName'),
            'helperName' => $request->get('helperName'),
            'contact' => $request->get('contact'),
            'carNo' => $request->get('carNo'),
            'locationStart' => $request->get('locationStart'),
            'locationEnd' => $request->get('locationEnd'),
            'kplCost' => $request->get('kplCost'),
            'policeCost' => $request->get('policeCost'),
            'foodAllowanceCost' => $request->get('foodAllowanceCost'),
            'maintainingCost' => $request->get('maintainingCost'),
            'tollCost' => $request->get('tollCost'),
            'othersCost' => $request->get('othersCost'),
            'totalCost' => $request->get('totalCost'),
        ]);
        $distributor->save();        
        return redirect('/distributor')->with('success','Distribution Cost Created!');
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

    public function distributorPrint($id)
    {
        $distributor = Distributor::find($id);
        return view('distributor.distributorPrint', compact('distributor')); 
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
            'invoiceNo'=>['required'],
            'date'=>'required',
            'driverName'=>'required',
            'contact'=>'required',
            'carNo'=>'required',

        ]);
        $distributor = Distributor::find($id);
        $distributor->invoiceNo =  $request->get('invoiceNo');
        $distributor->date = $request->get('date');
        $distributor->driverName = $request->get('driverName');
        $distributor->helperName = $request->get('helperName');
        $distributor->contact = $request->get('contact');
        $distributor->carNo = $request->get('carNo');
        $distributor->locationStart = $request->get('locationStart');
        $distributor->locationEnd = $request->get('locationEnd');
        $distributor->kplCost = $request->get('kplCost');
        $distributor->policeCost = $request->get('policeCost');
        $distributor->foodAllowanceCost = $request->get('foodAllowanceCost');
        $distributor->maintainingCost = $request->get('maintainingCost');
        $distributor->tollCost = $request->get('tollCost');
        $distributor->othersCost = $request->get('othersCost');
        $distributor->totalCost = $request->get('totalCost');
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
