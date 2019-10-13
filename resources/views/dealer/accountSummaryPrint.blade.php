<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
@foreach($accountSummary as $accountSummarys)
 
<div class="container" id="box">
 <div class="row well">
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row ">
                    <p class="font-weight-bold text-success ">Company Copy</p>
                        <div class="col-md-9 text-center">
                        <img src="{{ asset('images/1567415894.png') }}" width="50" height="50" alt="SGFL Logo" class="brand-image img-circle elevation-3"/>
                            <p class="font-weight-bold mb-1">Company Information</p>
                            <p><span class="font-weight-bold"><b>SGFL</b></span></p>
                            <p><span class="text-muted">Address: </span> Dhaka</p>
                            <p><span class="text-muted">Contact: </span> 12312123</p>
                            <p><span class="text-muted">Email: </span> sgfl@gmail.com</p>
                        </div>
                        <div class="col-md-0 text-right">
                            <input id="printpagebutton" type="button" class="btn btn-success" value="Print" onclick="printpage()"/>
                        </div>
                        <div class="col-md-9">
                        <p class="font-weight-bold">Dealer Information</p>
                            <p class="text-danger text-bold">Name: {{$accountSummarys->name}}</p>
                            <p class="text-success text-bold">Code: {{$accountSummarys->code}}</p>
                            <p>Address: {{$accountSummarys->address}}</p>
                            <p>Contact: {{$accountSummarys->contact}}</p>
                        </div>

                    </div>
                   
                    <div class="row p-0">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Date</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Details</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Paid Amoun</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">DO Amount</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Balance</th>
                                    </tr>
                                </thead> 
                                <tbody>
                                @foreach ($accountSummarys->accountSummary as $paymentlist)
                                    <tr>
                                        <td>{{date('d-m-y',strtotime($paymentlist->date))}}</td>
                                        <td>{{$paymentlist->paymentNo}} {{$paymentlist->invoiceNo}}</td>
                                        <td>{{$paymentlist->paidAmount}}</td>
                                        <td>{{$paymentlist->doAmount}}</td>
                                        <td step = "0">{{$paymentlist->balance}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex flex-row-reverse bg-danger text-black ">
                        <div class="py-1 px-1 text-right">
                            <div><b> Remain Balance:</b></div>
                            <div class="h2 font-weight-light"><b>{{$accountSummarys->amount}}</b></div>
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