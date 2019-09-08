<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Dealer;
use SGFL\Payment;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealer = Dealer::paginate(8);

        $dealersPayment=Dealer::leftJoin('payments', 'dealers.id', '=', 'payments.dealerId')
        ->select(\DB::raw('dealers.id, SUM(payments.amount) as amounts'))
        ->groupBy('dealers.id')
        ->get();
        // $dealersPayment = \DB::table('payments')
        // ->join('dealers', 'payments.dealerId','=','dealers.id')
        // ->where('payments.status', '=','paid')
        // ->sum('payments.amount');

        return view('dealer.index', compact('dealer','dealersPayment'));
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
        $dealer = Dealer::find($id);
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

