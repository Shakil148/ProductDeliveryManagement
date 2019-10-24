<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use SGFL\Depo;
use SGFL\DepoInvoice;
use SGFL\DepoInvoiceDetail;
use SGFL\Product;
use Auth;

class DepoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depo = Depo::orderBy('created_at', 'desc')->get();        
            return view('depo.index', compact('depo'));
    }

    public function depoInvoiceList()
    {
        $depoInvoices = DepoInvoice::with('depo')
        ->orderBy('created_at', 'desc')
        ->get();
        // dd($depoInvoices);
        return view('depo.depoInvoiceList', compact('depoInvoices'));
    }
    public function depoInvoicePrint($id)
    {
        $depoInvoicePrint = DepoInvoice::with('depoInvoiceDetail','depo')
        ->where('id', '=', $id)
        ->get();
         //dd($invoicePrint);
        return view('depo.depoInvoicePrint', compact('depoInvoicePrint'));
    }
    
    public function depoInvoiceDetail($id)
    {
        $depoInvoiceDetail = DepoInvoiceDetail::where('depoInvoiceId','=',$id)->get();
        return view('depo.depoInvoiceDetail',compact('depoInvoiceDetail'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function depoInvoice($id)
    {
       $lastorderId = DepoInvoice::orderBy('id', 'desc')->first()->invoiceNo;

        // if ( ! $lastOrderId )
        // // We get here if there is no order at all
        // // If there is no number set it to 0, which will be 1 at the end.

        // $lastIncreament = 001;
        // else 
        // Get last 3 digits of last order id
        $lastIncreament = substr($lastorderId, -4);

        // Make a new order id with appending last increment + 1
        $newDepoId = 'DIN' . date('md') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

        $depo = Depo::find($id);
 
        $product = Product::with('depoInvoiceDetail')->get();
        return view('depo.depoInvoice', compact('depo','product','newDepoId'));

    }
    public function depoInvoiceStore(Request $request,$id){
        $request->validate([
            'invoiceNo' => ['required','unique:depo_invoices'],
            'driverMobile'=>['required','min:11','max:11'],
            'product' => 'required',
            'date' => 'required',
        ]);

        $depo = Depo::find($id);
                
        $depoInvoice = new DepoInvoice;
        $depoInvoice->depoId =$id;
        $depoInvoice->invoiceNo = $request->get('invoiceNo');
        $depoInvoice->date = $request->get('date');
        $depoInvoice->grandTotalUnit = $request->get('grandTotalUnit');
        $depoInvoice->comment = $request->get('comment');
        $depoInvoice->truckNo = $request->get('truckNo');
        $depoInvoice->driverName = $request->get('driverName');
        $depoInvoice->driverMobile = $request->get('driverMobile');
        $depoInvoice->userName = Auth::user()->name;
        $depoInvoice->save();
        $invoice =$depoInvoice->id;
     

        $product = new Product;
   

        if(count($request->product) > 0)
        {
        foreach($request->product as $i=>$v){
            $data2=array(
                'depoInvoiceId'=>$invoice,
                'product' => $request->product[$i],
                'productId' => $request->productId[$i],
                'invoiceUnit' => $request->invoiceUnit[$i],
                'totalUnit' => $request->totalUnit[$i],
                
            );
            //$product->totalStock -= $request->invoiceUnit[$i];
           // $product->save();
        DepoInvoiceDetail::insert($data2);
      }
        }
        

        return redirect()->back()->with('success','Invoice Created successfully');
    }
    public function create()
    {
        return view('depo.create');
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
            'name'=>['required', 'unique:depos'], 
            'contact'=>['required','min:11','max:11'],
            'address'=>'required',
            'status'=>'required',
        ]);
        $depo = new Depo;
        $depo->name = $request->get('name');
        $depo->contact = $request->get('contact');
        $depo->address = $request->get('address');
        $depo->status = $request->get('status');
        $depo->userName = Auth::user()->name;
        $depo->save();
        return redirect('/depo')->with('success', 'Depo Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if( ( Auth::user()->role ) == "admin" ){
         $depo = Depo::find($id);
        return view('depo.edit', compact('depo'));
        }
        else{
            return redirect()->back()->with('failed','You are not Admin');
        }
    }
    public function depoInvoiceEdit($id)
    {
        if( ( Auth::user()->role ) == "admin" ){
         $depoInvoice = DepoInvoice::find($id);
        return view('depo.depoInvoiceEdit', compact('depoInvoice'));
    }
    else{
        return redirect()->back()->with('failed','You are not Admin');
    }
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
            'contact'=>['required','min:11','max:11'],
            'address'=>'required',
            'status'=>'required',
        ]);
        $depo = Depo::find($id);
        $depo->name =  $request->get('name');
        $depo->contact = $request->get('contact');
        $depo->address = $request->get('address');
        $depo->status = $request->get('status');
        $depo->save();


        return redirect('/depo')->with('success', 'Depo updated!');
    }
    public function depoInvoiceUpdate(Request $request, $id)
    {
        $request->validate([
            'date'=>['required'], 
            'driverMobile'=>['required','min:11','max:11'],

        ]);
        $depo = DepoInvoice::find($id);
        $depo->date =  $request->get('date');
        $depo->truckNo = $request->get('truckNo');
        $depo->driverName = $request->get('driverName');
        $depo->driverMobile = $request->get('driverMobile');
        $depo->comment = $request->get('comment');
        $depo->save();


        return redirect()->back()->with('success','Invoice Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function depoInvoiceDestroy($id)
    {
        if( ( Auth::user()->role ) == "admin" ){
            $depoInvoice = DepoInvoice::find($id);
            $depoInvoice->delete();
    
            return redirect()->back()->with('failed','DEPO Invoice Deleted');
            }
            else{
                return redirect()->back()->with('failed','You are not Admin');
            }
    }
    public function destroy($id)
    {
        if( ( Auth::user()->role ) == "admin" ){
            $depo = Depo::find($id);
            $depo->delete();
    
            return redirect()->back()->with('failed','DEPO Deleted');
            }
            else{
                return redirect()->back()->with('failed','You are not Admin');
            }
    }
}
