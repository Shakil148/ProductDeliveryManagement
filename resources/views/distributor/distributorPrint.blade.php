<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ----------> 
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                            <p class="font-weight-bold mb-1">Invoice No#{{$distributor->invoiceNo}}</p>
                            <p class="text-muted"> Date:{{date('d-m-y',strtotime($distributor->date))}}</p>
                        </div>
                        <div class="col-md-9">
                        <p class="font-weight-bold">Car Information</p>
                            <p class="text-danger text-bold">Driver Name: {{$distributor->driverName}}</p>
                            <p>Helper Name: {{$distributor->helperName}}</p>
                            <p>Driver Contact: {{$distributor->contact}}</p>
                        </div>
                        <div class="col-md-0">
                            <p class="font-weight-bold">Route Information</p>
                            <p>Starts From: {{$distributor->locationStart}}</p>
                            <p>Ends On: {{$distributor->locationEnd}}</p>
                            <p>Car No: {{$distributor->carNo}}</p>
                        </div>
                    </div>
                   
                    <div class="row p-0">
                        <div class="col-md-12">
                        <p class="font-weight-bold text-danger text-center">Cost Information</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">KPL Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Police Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Food Allowance Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Maintaining Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Toll Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Others Cost</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>{{$distributor->kplCost}}</td>
                                        <td>{{$distributor->policeCost}}</td>
                                        <td>{{$distributor->foodAllowanceCost}}</td>
                                        <td>{{$distributor->maintainingCost}}</td>
                                        <td>{{$distributor->tollCost}}</td>
                                        <td>{{$distributor->othersCost}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-warning text-black ">
                        <div class="py-1 px-1 text-right">
                            <div><b>Total Cost</b></div>
                            <div class="h2 font-weight-light"><b>{{$distributor->totalCost}}</b></div>
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
 
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
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
                            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                            <p class="font-weight-bold mb-1">Invoice No#{{$distributor->invoiceNo}}</p>
                            <p class="text-muted"> Date:{{date('d-m-y',strtotime($distributor->date))}}</p>
                        </div>
                        <div class="col-md-9">
                        <p class="font-weight-bold">Car Information</p>
                            <p class="text-danger text-bold">Driver Name: {{$distributor->driverName}}</p>
                            <p>Helper Name: {{$distributor->helperName}}</p>
                            <p>Driver Contact: {{$distributor->contact}}</p>
                        </div>
                        <div class="col-md-0">
                            <p class="font-weight-bold">Route Information</p>
                            <p>Starts From: {{$distributor->locationStart}}</p>
                            <p>Ends On: {{$distributor->locationEnd}}</p>
                            <p>Car No: {{$distributor->carNo}}</p>
                        </div>
                    </div>
                   
                    <div class="row p-0">
                        <div class="col-md-12">
                        <p class="font-weight-bold text-danger text-center">Cost Information</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">KPL Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Police Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Food Allowance Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Maintaining Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Toll Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Others Cost</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>{{$distributor->kplCost}}</td>
                                        <td>{{$distributor->policeCost}}</td>
                                        <td>{{$distributor->foodAllowanceCost}}</td>
                                        <td>{{$distributor->maintainingCost}}</td>
                                        <td>{{$distributor->tollCost}}</td>
                                        <td>{{$distributor->othersCost}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-warning text-black ">
                        <div class="py-1 px-1 text-right">
                            <div><b>Total Cost</b></div>
                            <div class="h2 font-weight-light"><b>{{$distributor->totalCost}}</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="text-dark mt-5  text-right mb-3"><b> Distribution Signature</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b>Depo Signature</b></div>

</div>
        
        
	</div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>
 
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                    <p class="font-weight-bold text-success ">Depo Copy</p>
                        <div class="col-md-8 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.com</p>
                        </div>
                        <div class="col-md-0 text-right d-inline">
                            <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                            <p class="font-weight-bold mb-1">Invoice No#{{$distributor->invoiceNo}}</p>
                            <p class="text-muted"> Date:{{date('d-m-y',strtotime($distributor->date))}}</p>
                        </div>
                        <div class="col-md-9">
                        <p class="font-weight-bold">Car Information</p>
                            <p class="text-danger text-bold">Driver Name: {{$distributor->driverName}}</p>
                            <p>Helper Name: {{$distributor->helperName}}</p>
                            <p>Driver Contact: {{$distributor->contact}}</p>
                        </div>
                        <div class="col-md-0">
                            <p class="font-weight-bold">Route Information</p>
                            <p>Starts From: {{$distributor->locationStart}}</p>
                            <p>Ends On: {{$distributor->locationEnd}}</p>
                            <p>Car No: {{$distributor->carNo}}</p>
                        </div>
                    </div>
                   
                    <div class="row p-0">
                        <div class="col-md-12">
                        <p class="font-weight-bold text-danger text-center"> Cost Information</p>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">KPL Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Police Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Food Allowance Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Maintaining Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Toll Cost</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Others Cost</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                    <tr>
                                        <td>{{$distributor->kplCost}}</td>
                                        <td>{{$distributor->policeCost}}</td>
                                        <td>{{$distributor->foodAllowanceCost}}</td>
                                        <td>{{$distributor->maintainingCost}}</td>
                                        <td>{{$distributor->tollCost}}</td>
                                        <td>{{$distributor->othersCost}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-warning text-black ">
                        <div class="py-1 px-1 text-right">
                            <div><b>Total Cost</b></div>
                            <div class="h2 font-weight-light"><b>{{$distributor->totalCost}}</b></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="text-bold mt-5 mb-0 text-right "><b>Depo Signature</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <b> Distribution Signature</b></div>

</div>
        
        
	</div>
</div>
<script>
function myFunction() {
    window.print();
}
</script>




