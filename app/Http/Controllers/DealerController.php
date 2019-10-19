<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Dealer;
use SGFL\Payment;
use SGFL\DealerBalance;
use SGFL\DealerInvoice;
use SGFL\AccountSummary;
use Auth;

class DealerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        $dealer = Dealer::orderBy('created_at', 'desc')->get();        
    //     $dealersPayment = Dealer::leftJoin('payments', 'dealers.id', '=', 'payments.dealerId')
    //    ->select(\DB::raw('dealers.id, SUM(payments.amount) as balance'))
    //    ->groupBy('dealers.id')
    //    ->get();
        return view('dealer.index', compact('dealer'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        if( ( Auth::user()->role ) != "viewer" ){
            $lastId = Dealer::orderBy('id', 'desc')->first()->code;


            $lastIncreament = substr($lastId, -4);

            // Make a new dealer code with appending last increment + 1
            $newId = '' . date('') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

            return view('dealer.create', compact('newId'));
        }
        else{
            return view('viewer.page');
        }
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
            'name'=>['required', 'unique:dealers'], 
            'code'=>['required', 'unique:dealers'],
            'contact'=>['required','min:11','max:11'],
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
        if( ( Auth::user()->role ) != "viewer" ){
        $dealer = Dealer::find($id);
        return view('dealer.edit', compact('dealer'));
        }
    }

    public function accountSummary($id){
        // $accountSummary = AccountSummary::find($id);
        // return view('dealer.accountSummary', compact('accountSummary'));
        $accountSummary = Dealer::with('accountSummary')
        ->where('id','=',$id)->get();
        return view('dealer.accountSummary',compact('accountSummary'));
        

    }
    public function accountSummaryPrint($id){
        // $accountSummary = AccountSummary::find($id);
        // return view('dealer.accountSummary', compact('accountSummary'));
        $accountSummary = Dealer::with('accountSummary')
        ->where('id','=',$id)->get();
        return view('dealer.accountSummaryPrint',compact('accountSummary'));
        

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
            'name'=>['required'], 
            'code'=>['required'],
            'contact'=>['required','min:11','max:11'],
            'address'=>'required',
            'status'=>'required',
        ]);
        $dealer = Dealer::find($id);
        $dealer->name =  $request->get('name');
        $dealer->code =  $request->get('code');
        $dealer->contact = $request->get('contact');
        $dealer->amount = $request->get('amount');
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
    public function summaryDestroy($id)
    {
        if( ( Auth::user()->role ) == "admin" ){
        $summary = AccountSummary::find($id);
        $summary->delete();

        return redirect()->back()->with('success','Summary Deleted');
        }
        else{
            return redirect()->back()->with('success','You are not Admin');
        }
    }
}

