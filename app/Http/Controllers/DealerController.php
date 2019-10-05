<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Dealer;
use SGFL\Payment;
use SGFL\DealerBalance;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $dealer = Dealer::orderBy('created_at', 'desc')->paginate(8);        
        $dealersPayment=Dealer::leftJoin('payments', 'dealers.id', '=', 'payments.dealerId')
       ->select(\DB::raw('dealers.id, SUM(payments.amount) as balance'))
       ->groupBy('dealers.id')
       ->get();
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
            'code'=>['required', 'unique:dealers'],
            'contact'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);
        $dealer = new Dealer;
        $dealer->name = $request->get('name');
        $dealer->code = $request->get('code');
        $dealer->contact = $request->get('contact');
        $dealer->address = $request->get('address');
        $dealer->status = $request->get('status');
        $dealer->save();
        
        // $dealerbalance = new DealerBalance();
        // $dealerbalance->name = $request->get('name');
        // $dealerbalance->dealer = $request->get('id');
        // $dealerbalance->save();
        
        

 
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
            'code'=>['required', 'unique:dealers'],
            'contact'=>'required',
            'address'=>'required',
            'status'=>'required',
        ]);
        $dealer = Dealer::find($id);
        $dealer->name =  $request->get('name');
        $dealer->code =  $request->get('code');
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

