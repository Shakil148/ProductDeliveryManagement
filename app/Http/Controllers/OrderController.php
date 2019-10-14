<?php

namespace SGFL\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use SGFL\Product;
use SGFL\Dealer;
use SGFL\DealerInvoice;
use SGFL\DealerInvoiceDetail;
use SGFL\AccountSummary;
class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function orderInvoicelist()
    {
        $dealerInvoice = DealerInvoice::with('dealer')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('order.invoicelist', compact('dealerInvoice'));
    }
    public function orderInvoicePrint($id)
    {
        // $invoicePrint = \DB::table('dealer_invoices')
        // ->where('dealer_invoices.id', '=', $id)
        // ->join('dealers', 'dealers.id', '=', 'dealer_invoices.dealerId')
        // ->join('dealer_invoice_details', 'dealer_invoices.id', '=', 'dealer_invoice_details.dealerInvoiceId')
        // ->select('dealer_invoices.*', 'dealers.name', 'dealers.address', 'dealers.contact',
        // 'dealer_invoice_details.product', 'dealer_invoice_details.price', 'dealer_invoice_details.invoiceUnit', 'dealer_invoice_details.freeUnit', 'dealer_invoice_details.totalUnit', 'dealer_invoice_details.total')
        // ->get();

        $invoicePrint = DealerInvoice::with('dealerInvoiceDetail','dealer')
        ->where('id', '=', $id)
        ->get();
         //dd($invoicePrint);
        return view('order.invoicePrint', compact('invoicePrint'));
    }
    
    public function invoiceDetail($id)
    {
        $invoiceDetail = dealerInvoiceDetail::where('dealerInvoiceId','=',$id)->get();
        return view('order.invoiceDetail',compact('invoiceDetail'));
    }




    public function orderInvoice($id)
    {
        $lastorderId = DealerInvoice::orderBy('id', 'desc')->first()->invoiceNo;

        // if ( ! $lastOrderId )
        // // We get here if there is no order at all
        // // If there is no number set it to 0, which will be 1 at the end.

        // $lastIncreament = 001;
        // else 
        // Get last 3 digits of last order id
        $lastIncreament = substr($lastorderId, -4);

        // Make a new order id with appending last increment + 1
        $newOrderId = 'INV' . date('md') . str_pad($lastIncreament + 1, 3, 0, STR_PAD_LEFT);

        $dealer = Dealer::find($id);
        $product = Product::with('dealerInvoiceDetail')->get();
        return view('order.invoice', compact('dealer','newOrderId','product'));
    }
    public function invoiceEdit($id)
    {
        $dealerInvoice = DealerInvoice::find($id);
        return view('order.invoiceEdit', compact('dealerInvoice'));
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
        $dealerInvoice = DealerInvoice::with('dealer')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('dashboard.dealerInvoice', compact('dealerInvoice'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function dealerInvoice(Request $request,$id){
        $request->validate([
            // 'name'=>'required',
            // 'price'=>'required',
            // 'unit'=>'required',
            // 'image'=>'required',
            'invoiceNo' => ['required','unique:dealer_invoices'],
            'product' => 'required',
            'date' => 'required',
        ]);

        $dealer = Dealer::find($id);
       
        $dealerInvoice = new DealerInvoice;
        $dealerInvoice->dealerId =$id;
        $dealerInvoice->invoiceNo = $request->get('invoiceNo');
        $dealerInvoice->date = $request->get('date');
        $dealerInvoice->totalPrice = $request->get('totalPrice');
        $dealerInvoice->remainBalance = $request->get('remainBalance');
        $dealerInvoice->grandTotalUnit = $request->get('grandTotalUnit');
        $dealerInvoice->comment = $request->get('comment');
        $dealerInvoice->truckNo = $request->get('truckNo');
        $dealerInvoice->driverName = $request->get('driverName');
        $dealerInvoice->driverMobile = $request->get('driverMobile');
        $dealerInvoice->userName = Auth::user()->name;
        $dealerInvoice->save();
        $invoice =$dealerInvoice->id;
        // $data=$request->all();
        // $lastid= DealerInvoice::create( 
        //     [
        //     'dealerId' => $id,
        //     'invoiceNo' => $request['invoiceNo'],
        //     'totalPrice' => $request['totalPrice'],
        //     'comment' => $request['comment'],
        //     ]
        // )->id;
        $dealer->amount -= $request->get('totalPrice');
        $dealer->save();

        $accountSummary = new AccountSummary;
        $accountSummary->dealerId =$id;
        $accountSummary->date = $request->get('date');
        $accountSummary->invoiceNo = $request->get('invoiceNo');
        $accountSummary->doAmount = $request->get('totalPrice');
        $accountSummary->balance = round($dealer->amount, 2);
        $accountSummary->save();

        if(count($request->product) > 0)
        {
        foreach($request->product as $i=>$v){
            $data2=array(
                'dealerInvoiceId'=>$invoice,
                // 'product_name'=>$request->product_name[$item],
                // 'brand'=>$request->brand[$item],
                // 'quantity'=>$request->quantity[$item],
                // 'budget'=>$request->budget[$item],
                // 'amount'=>$request->amount[$item],
                'product' => $request->product[$i],
                'productId' => $request->productId[$i],
                'price' => $request->price[$i],
                'invoiceUnit' => $request->invoiceUnit[$i],
                'freeUnit' => $request->freeUnit[$i],
                'totalUnit' => $request->totalUnit[$i],
                'total' => $request->total[$i],
            );
        DealerInvoiceDetail::insert($data2);
      }
        }
        

        return redirect()->back()->with('success','Invoice Created successfully');
    }
    public function invoiceUpdate(Request $request,$id){
        $request->validate([
            'date' => 'required',
        ]);

        $dealerInvoice = DealerInvoice::find($id);
        $dealerInvoice->date = $request->get('date');
        $dealerInvoice->comment = $request->get('comment');
        $dealerInvoice->truckNo = $request->get('truckNo');
        $dealerInvoice->driverName = $request->get('driverName');
        $dealerInvoice->driverMobile = $request->get('driverMobile');
        //$dealerInvoice->userName = Auth::user()->name;
        $dealerInvoice->save();
        
        

        return redirect()->back()->with('success','Invoice Updated successfully');
    }
    
        // for($i = 0; $i < 100; ++$i){
    
        //     $dealerInvoice = new DealerInvoice;
        //     $dealerInvoice->orderId = $request->orderId;
        //     $dealerInvoice->dealerId = $request->dealerId;
        //     $dealerInvoice->invoiceNo = $request->invoiceNo[$i];
        //     $dealerInvoice->productId = $request->productId[$i];
        //     $dealerInvoice->invoiceUnit = $request->invoiceUnit[$i];
        //     $dealerInvoice->freeUnit = $request->freeUnit[$i];
        //     $dealerInvoice->totalUnit = $request->totalUnit[$i];
        //     $dealerInvoice->totalPrice = $request->totalPrice;
        //     $dealerInvoice->remainUnit = $request->remainUnit;
        //     $dealerInvoice->remainBalance = $request->remainBalance;
        //     $dealerInvoice->save();
        // }
        // $dealerInvoice = new DealerInvoice([
        //     'invoiceNo' => $request->get('invoiceNo'),
        //     'orderId' => $request->get('orderId'),
        //     'productId' => $request->get('productId'),
        //     'invoiceUnit' => $request->get('invoiceUnit'),
        //     'freeUnit' => $request->get('freeUnit'),
        //     'totalUnit' => $request->get('totalUnit'),
        //     'totalPrice' => $request->get('totalPrice'),
        //     'remainUnit' => $request->get('remainUnit'),
        //     'remainBalance' => $request->get('remainBalance'),
        // ]);
  
        // $dealerInvoice->save();
       //return redirect('/dealerinvoice')->with('success', 'Invoice Created!');
    


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
        $dealerInvoice = DealerInvoice::find($id);
        $dealerInvoice->delete();

        return redirect()->back()->with('success','Invoice Delete successfully');
    }
}
