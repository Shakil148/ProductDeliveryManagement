<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\DealerBalanceRecord;
use SGFL\Dealer;
use SGFL\DealerBalance;


class DealerBalanceRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealerbalancerecord = DealerBalanceRecord::with('dealer')->get();
        return view('balance.index', compact('dealerbalancerecord')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('balance.create')
        ->with('dealer', Dealer::all());
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
            'dealerId'=>'required',
            'type'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);

        $dealer = Dealer::find(1);
        $dealerbalancerecord = new DealerBalanceRecord;
        $dealerbalancerecord->dealerId = $dealer->id;
        $dealerbalancerecord->dealerId = $request->get('dealerId');
        $dealerbalancerecord->type = $request->get('type');
        $dealerbalancerecord->accountNo = $request->get('accountNo');
        $dealerbalancerecord->bankName = $request->get('bankName');
        $dealerbalancerecord->amount = $request->get('amount');
        $dealerbalancerecord->date = $request->get('date');
        $dealerbalancerecord->status = $request->get('status');
        $dealerbalancerecord->comment = $request->get('comment');
        $dealerbalancerecord->save();
        
        
        $dealerbalance = new DealerBalance();
        $dealerbalance->dealerId = $dealer->id;
        $dealerbalance->amount += $request->get('amount');
        $dealerbalance->save();

        return redirect('/balance')->with('success', 'Payment Created!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
