<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\DealerBalanceRecord;
use SGFL\Dealer;
use SGFL\AccountSummary;
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
        ->get();
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

    public function search(Request $request){
        // $search = $request->get('search');
        // $dealerbalancerecord = Dealer::with('dealerBalanceRecord')->whereHas('dealerBalanceRecord', 
        // function($query) {
        //     $query->whereCountry('uk');
        //   })->paginate(8);
        // return view('balance.index', compact('dealerbalancerecord')); 
        // $search = $request->get('search');
        // $dealerbalancerecord = Dealer::where('code','like','%'.$search.'%')
        // ->orWhere('name','like','%'.$search.'%')
        // ->orWhereHas('dealerBalanceRecord', function ($query) use ($search) {
        //     $query->where('date', 'like', '%'.$search.'%');
        // })
        // ->orderBy('created_at', 'desc')
        // ->paginate(8  );
        // return view('dashboard.payment', compact('dealerbalancerecord')); 
        $dealerbalancerecord = DealerBalanceRecord::with('dealer')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
        return view('dashboard.payment', compact('dealerbalancerecord')); 

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
        $balance = Dealer::where('id','=', $id)->first()->amount;
        $lastorderId = DealerBalanceRecord::orderBy('id', 'desc')->first()->paymentNo;


        $lastIncreament = substr($lastorderId, -4);

        // Make a new order id with appending last increment + 1
        $newPaymentId = 'PAY' . date('md') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);
        $dealer = Dealer::find($id);
        return view('balance.edit', compact('dealer','newPaymentId','balance'));
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
        $dealerbalancerecord->paymentNo = $request->get('paymentNo');
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
        
        $accountSummary = new AccountSummary;
        $accountSummary->dealerId =$id;
        $accountSummary->date = $request->get('date');
        $accountSummary->paymentNo = $request->get('paymentNo');
        $accountSummary->paidAmount = $request->get('amount');
        $accountSummary->balance = $dealer->amount;
        $accountSummary->save();
        
        
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
