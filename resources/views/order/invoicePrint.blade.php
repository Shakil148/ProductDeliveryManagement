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
                    <div class="row p-5">
                        <div class="col-md-6 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.come</p>
                        </div>
                        <div class="col-md-6 text-right d-inline">
                            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                            <p class="font-weight-bold mb-1">Invoice No#{{$invoicePrintList->invoiceNo}}</p>
                            <p class="text-muted">Due to: {{$invoicePrintList->created_at}}</p>
                        </div>
                        <div class="col-md-6 d-inline">
                            <p class="font-weight-bold">Dealer Information</p>
                            <p>Name:{{$invoicePrintList->dealer->name}}</p>
                            <p>Address:{{$invoicePrintList->dealer->address}}</p>
                            <p>Contact:{{$invoicePrintList->dealer->contact}}</p>
                        </div>
                    </div>
                    
                    <div class="row p-0">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Item</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Unit Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Free Unit</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Price</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total Unit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$invoicePrintList->dealerInvoiceDetail->product}}</td>
                                        <td>{{$invoicePrintList->dealerInvoiceDetail->price}}</td>
                                        <td>{{$invoicePrintList->dealerInvoiceDetail->invoiceUnit}}</td>
                                        <td>{{$invoicePrintList->dealerInvoiceDetail->freeUnit}}</td>
                                        <td>{{$invoicePrintList->dealerInvoiceDetail->total}}</td>
                                        <td>{{$invoicePrintList->dealerInvoiceDetail->totalUnit}}</td>
                                    </tr>
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
    
    <div class="text-dark mt-5 mb-0 text-right "><b>Signature By<b></div>

</div>
        
        
	</div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
@endforeach


