<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@foreach($invoicePrint as $invoicePrintList)
 
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="font-weight-bold text-muted text-center">Dealer Invoice</h4>
                    <div class="row ">
                    <p class="font-weight-bold text-success ">Company Copy</p>
                        <div class="col-md-8 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.com</p>
                        </div>
                        <div class="col-md-0 text-right d-inline">
                            <input id="printpagebutton" type="button" class="btn btn-success" value="Print" onclick="printpage()"/>
                            <p class="font-weight-bold mb-1">Inv No#{{$invoicePrintList->invoiceNo}}</p>
                            <p class="text-muted">Date: {{date('d-m-y',strtotime($invoicePrintList->date))}}</p>
                        </div>
                        <div class="col-md-9">
                        <p class="font-weight-bold">Dealer Information</p>
                            <p class="text-danger text-bold">Name: {{$invoicePrintList->dealer->name}}</p>
                            <p class="text-success text-bold">Code: {{$invoicePrintList->dealer->code}}</p>
                            <p>Address: {{$invoicePrintList->dealer->address}}</p>
                            <p>Contact: {{$invoicePrintList->dealer->contact}}</p>
                        </div>
                        <div class="col-md-0">
                            <p class="font-weight-bold">Distribution Information</p>
                            <p>Truck No: {{$invoicePrintList->truckNo}}</p>
                            <p>Driver Name: {{$invoicePrintList->driverName}}</p>
                            <p>Mobile: {{$invoicePrintList->driverMobile}}</p>
                        </div>
                    </div>
                   
                    <div class="row p-0">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Free Unit</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Unit</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Price</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                @foreach ($invoicePrintList->dealerInvoiceDetail as $invoiceList)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$invoiceList->product}}</td>
                                        <td>{{$invoiceList->invoiceUnit}}</td>
                                        <td>{{$invoiceList->freeUnit}}</td>
                                        <td>{{$invoiceList->totalUnit}}</td>
                                        <td>{{$invoiceList->price}}</td>
                                        <td>{{$invoiceList->total}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-danger text-black ">
                        <div class="py-1 px-1 text-right">
                            <div><b> Grand Total Price</b></div>
                            <div class="h2 font-weight-light"><b>{{$invoicePrintList->totalPrice}}</b></div>
                        </div>

                        <div class="py-1 px-5 text-right">
                            <div><b>Grand Total Unit</b></div>
                            <div class="h2 font-weight-light"><b>{{$invoicePrintList->grandTotalUnit}}</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-dark mt-5 mb-0 text-right mb-3"><b> Authority Signature</b></div>

</div>
        
        
	</div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
<script type="text/javascript">
    function printpage() {
        //Get the print button and put it into a variable
        var printButton = document.getElementById("printpagebutton");
        //Set the print button visibility to 'hidden' 
        printButton.style.visibility = 'hidden';
        //Print the page content
        window.print()
        //Set the print button to 'visible' again 
        //[Delete this line if you want it to stay hidden after printing]
        printButton.style.visibility = 'visible';
    }
</script>
@endforeach
@foreach($invoicePrint as $invoicePrintList)
 
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="font-weight-bold text-muted text-center">Dealer Invoice</h4>
                    <div class="row ">
                    <p class="font-weight-bold text-success ">Distribution Copy</p>
                        <div class="col-md-8 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.com</p>
                        </div>
                        <div class="col-md-0 text-right d-inline">
                            <p class="font-weight-bold mb-1">Inv No#{{$invoicePrintList->invoiceNo}}</p>
                            <p class="text-muted">Date: {{date('d-m-y',strtotime($invoicePrintList->date))}}</p>
                        </div>
                        <div class="col-md-9">
                            <p class="font-weight-bold">Dealer Information</p>
                            <p class="text-danger text-bold">Name: {{$invoicePrintList->dealer->name}}</p>
                            <p class="text-success text-bold">Code: {{$invoicePrintList->dealer->code}}</p>
                            <p>Address: {{$invoicePrintList->dealer->address}}</p>
                            <p>Contact: {{$invoicePrintList->dealer->contact}}</p>
                        </div>
                        <div class="col-md-0">
                            <p class="font-weight-bold">Distribution Information</p>
                            <p>Truck No: {{$invoicePrintList->truckNo}}</p>
                            <p>Driver Name: {{$invoicePrintList->driverName}}</p>
                            <p>Mobile: {{$invoicePrintList->driverMobile}}</p>
                        </div>
                    </div>
                   
                    <div class="row p-0">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Free Unit</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Unit</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                @foreach ($invoicePrintList->dealerInvoiceDetail as $invoiceList)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$invoiceList->product}}</td>
                                        <td>{{$invoiceList->invoiceUnit}}</td>
                                        <td>{{$invoiceList->freeUnit}}</td>
                                        <td>{{$invoiceList->price}}</td>
                                        <td>{{$invoiceList->total}}</td>
                                        <td>{{$invoiceList->totalUnit}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-danger text-black ">
                        <div class="py-1 px-1 text-right">
                            <div><b> Grand Total Price</b></div>
                            <div class="h2 font-weight-light"><b>{{$invoicePrintList->totalPrice}}</b></div>
                        </div>

                        <div class="py-1 px-5 text-right">
                            <div><b>Grand Total Unit</b></div>
                            <div class="h2 font-weight-light"><b>{{$invoicePrintList->grandTotalUnit}}</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-dark mt-5  text-right mb-3"><b> Distribution Signature</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Customer Signature</b></div>

</div>
        
        
	</div>
</div>
@endforeach
@foreach($invoicePrint as $invoicePrintList)
 
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <h4 class="font-weight-bold text-muted text-center">Dealer Invoice</h4>
                    <div class="row ">
                    <p class="font-weight-bold text-success ">Customer Copy</p>
                        <div class="col-md-8 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.com</p>
                        </div>
                        <div class="col-md-0 text-right d-inline">
                            <p class="font-weight-bold mb-1">Inv No#{{$invoicePrintList->invoiceNo}}</p>
                            <p class="text-muted">Date: {{date('d-m-y',strtotime($invoicePrintList->date))}}</p>
                        </div>
                        <div class="col-md-9">
                            <p class="font-weight-bold">Dealer Information</p>
                            <p class="text-danger text-bold">Name: {{$invoicePrintList->dealer->name}}</p>
                            <p class="text-success text-bold">Code: {{$invoicePrintList->dealer->code}}</p>
                            <p>Address: {{$invoicePrintList->dealer->address}}</p>
                            <p>Contact: {{$invoicePrintList->dealer->contact}}</p>
                        </div>
                        <div class="col-md-0">
                            <p class="font-weight-bold">Distribution Information</p>
                            <p>Truck No: {{$invoicePrintList->truckNo}}</p>
                            <p>Driver Name: {{$invoicePrintList->driverName}}</p>
                            <p>Mobile: {{$invoicePrintList->driverMobile}}</p>
                        </div>
                    </div>
                   
                    <div class="row p-0">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Free Unit</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Unit</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                @foreach ($invoicePrintList->dealerInvoiceDetail as $invoiceList)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$invoiceList->product}}</td>
                                        <td>{{$invoiceList->invoiceUnit}}</td>
                                        <td>{{$invoiceList->freeUnit}}</td>
                                        <td>{{$invoiceList->price}}</td>
                                        <td>{{$invoiceList->total}}</td>
                                        <td>{{$invoiceList->totalUnit}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-danger text-black ">
                        <div class="py-1 px-1 text-right">
                            <div><b> Grand Total Price</b></div>
                            <div class="h2 font-weight-light"><b>{{$invoicePrintList->totalPrice}}</b></div>
                        </div>

                        <div class="py-1 px-5 text-right">
                            <div><b>Grand Total Unit</b></div>
                            <div class="h2 font-weight-light"><b>{{$invoicePrintList->grandTotalUnit}}</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-bold mt-5 mb-0 text-right "><b>Customer Signature</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b> Distribution Signature</b></div>

</div>
        
        
	</div>
</div>

@endforeach



