<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\DealerBalanceRecord;
use SGFL\Dealer;
use Auth;

class DealerBalanceRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dealerbalancerecord = DealerBalanceRecord::with('dealer')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('balance.index', compact('dealerbalancerecord')); 
    }
    public function balancePrint($id)
    {
        $paymentPrint = DealerBalanceRecord::with('dealer')
        ->where('dealer_balance_records.id','=',$id)
        ->get();
        return view('balance.balancePrint', compact('paymentPrint')); 
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        return view('balance.edit', compact('dealer'));
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
            'type'=>'required',
            'amount'=>'required',
            'status'=>'required',
        ]);

        $dealer = Dealer::find($id);
        $dealerbalancerecord = new DealerBalanceRecord;
        $dealerbalancerecord->dealerId =$id;
        $dealerbalancerecord->type = $request->get('type');
        $dealerbalancerecord->accountNo = $request->get('accountNo');
        $dealerbalancerecord->bankName = $request->get('bankName');
        $dealerbalancerecord->amount = $request->get('amount');
        $dealerbalancerecord->date = $request->get('date');
        $dealerbalancerecord->status = $request->get('status');
        $dealerbalancerecord->comment = $request->get('comment');
        $dealerbalancerecord->userName = Auth::user()->name;
        $dealerbalancerecord->save();
        
        $dealer->amount += $request->get('amount');
        $dealer->save();

        return redirect()->back()->with('success','Payment insert successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dealerBalanceRecord = DealerBalanceRecord::find($id);
        $dealerBalanceRecord->delete();

        return redirect()->back()->with('success','Payment Delete successfully');
    }
}
