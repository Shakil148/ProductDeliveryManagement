<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Payment;
use SGFL\Dealer;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment = \DB::table('payments')
            ->join('dealers', 'payments.dealerId', '=', 'dealers.id')
            ->select('payments.*', 'dealers.name')
            ->paginate(8);
            
        return view('payment.index', compact('payment'));    
    
        //$payment = Payment::with('dealer')->get();
        //return view('payment.index', compact('payment'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment.create')
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
        $payment = new Payment([
            'dealerId' => $request->get('dealerId'),
            'type' => $request->get('type'),
            'accountNo' => $request->get('accountNo'),
            'amount' => $request->get('amount'),
            'date' => $request->get('date'),
            'status' => $request->get('status'),
        ]);
        $payment->save();
        return redirect('/payment')->with('success', 'Payment Created!');
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
        $payment = Payment::find($id);
        $payment_new = \DB::table('payments')
            ->join('dealers', 'payments.dealerId', '=', 'dealers.id')
            ->select('payments.*', 'dealers.name')
            ->get();
        return view('payment.edit', compact('payment','payment_new'));
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
            'dealerId'=>'required',
            'type'=>'required',
            'amount'=>'required',
            'status'=>'required',

        ]);
        $payment = Payment::find($id);
        $payment->dealerId =  $request->get('dealerId');
        $payment->date =  $request->get('date');
        $payment->type = $request->get('type');
        $payment->amount = $request->get('amount');
        $payment->accountNo = $request->get('accountNo');
        $payment->status = $request->get('status');
        $payment->save();


        return redirect('/payment')->with('success', 'Payment record updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        return redirect('/payment')->with('success', 'Payment deleted!');
    }
}