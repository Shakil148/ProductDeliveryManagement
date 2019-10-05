<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@foreach($paymentPrint as $paymentPrintList)
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <p class="font-weight-bold text-success ">Company Copy</p>
                        <div class="col-md-11 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.come</p>
                        </div>
                        <div class="text-right d-inline">
                            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        </div>
                        <div class="col-md-6 d-inline">
                            <p class="font-weight-bold">Payment Information</p>
                            <p class="text-danger text-bold">Dealer Name: {{$paymentPrintList->dealer->name}}</p>
                            <p class="text-success text-bold">code: {{$paymentPrintList->dealer->code}}</p>
                            <p>Address:{{$paymentPrintList->dealer->address}}</p>
                            <p>Contact:{{$paymentPrintList->dealer->contact}}</p>
                        </div>
                    </div>
                    
                    <div class="row p-0">
                        <div class="col-md-12 bg-info">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Account No</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Bank Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Amount</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Date & Time</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Status</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$paymentPrintList->accountNo}}</td>
                                        <td>{{$paymentPrintList->bankName}}</td>
                                        <td>{{$paymentPrintList->amount}}</td>
                                        <td>{{$paymentPrintList->date}}</td>
                                        <td>{{$paymentPrintList->status}}</td>
                                        <td>{{$paymentPrintList->comment}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-dark mt-5 mb-0 text-right mb-4"><b>Authorize Signature</b></div>

</div>
        
        
	</div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
@endforeach
@foreach($paymentPrint as $paymentPrintList)
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <p class="font-weight-bold text-success ">Distribution Copy</p>
                        <div class="col-md-11 text-center ">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.come</p>
                        </div>
                        <div class=" text-right d-inline">
                            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        </div>
                        <div class="col-md-6 d-inline">
                            <p class="font-weight-bold">Payment Information</p>
                            <p class="text-danger text-bold">Dealer Name: {{$paymentPrintList->dealer->name}}</p>
                            <p>Address:{{$paymentPrintList->dealer->address}}</p>
                            <p>Contact:{{$paymentPrintList->dealer->contact}}</p>
                        </div>
                    </div>
                    
                    <div class="row p-0">
                        <div class="col-md-12 bg-info">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Account No</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Bank Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Amount</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Date & Time</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Status</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$paymentPrintList->accountNo}}</td>
                                        <td>{{$paymentPrintList->bankName}}</td>
                                        <td>{{$paymentPrintList->amount}}</td>
                                        <td>{{$paymentPrintList->date}}</td>
                                        <td>{{$paymentPrintList->status}}</td>
                                        <td>{{$paymentPrintList->comment}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-dark mt-5 mb-0 text-right mb-3"><b>Authorize Signature</b></div>

</div>
        
        
	</div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
@endforeach
@foreach($paymentPrint as $paymentPrintList)
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <p class="font-weight-bold text-success ">Customer Copy</p>
                        <div class="col-md-11 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.come</p>
                        </div>
                        <div class="text-right d-inline">
                            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                        </div>
                        <div class="col-md-6 d-inline">
                            <p class="font-weight-bold">Payment Information</p>
                            <p class="text-danger text-bold">Dealer Name: {{$paymentPrintList->dealer->name}}</p>
                            <p>Address:{{$paymentPrintList->dealer->address}}</p>
                            <p>Contact:{{$paymentPrintList->dealer->contact}}</p>
                        </div>
                    </div>
                    
                    <div class="row p-0">
                        <div class="col-md-12 bg-info">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">#</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Account No</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Bank Name</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Amount</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Date & Time</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Status</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$paymentPrintList->accountNo}}</td>
                                        <td>{{$paymentPrintList->bankName}}</td>
                                        <td>{{$paymentPrintList->amount}}</td>
                                        <td>{{$paymentPrintList->date}}</td>
                                        <td>{{$paymentPrintList->status}}</td>
                                        <td>{{$paymentPrintList->comment}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-dark mt-5 mb-0 text-right "><b>Authorize Signature </b></div>

</div>
        
        
	</div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
@endforeach



