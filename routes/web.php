<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
//middlewares to controller
//Route::resource('product', 'ProductController', ['middleware' => 'admin']);
//All routes
Route::group(['middleware' => 'auth'], function() {
    //all user index route
    Route::resource('user','AdminController');
    //Route::resource('admin','ProductController');
    Route::get('/viewer', 'ViewerController@viewer');
    Route::get('/tsm', 'TsmController@tsm');
    Route::get('/moderator', 'ModeratorController@moderator');
    Route::get('/admin', 'AdminController@admin');
    //product route
    Route::post('/products.store/{id}',[
        'uses' => 'ProductController@productStore',
        'as' =>'productStore.store']);
    Route::get('/products.create/{id}',[
        'uses' => 'ProductController@productCreate',
        'as' =>'productStore.create']);
    Route::resource('product', 'ProductController');
    //Mainwarehouse route
    Route::resource('mainwarehouse', 'MainWarehouseController')->except('create');
    //WarehouseOrder route
    Route::get('/localwarehouseorder',[
        'uses' => 'WarehouseOrderController@order',
        'as' =>'warehouses.order']);
    Route::get('/addtocart/{id}',[
        'uses' =>  'WarehouseOrderController@getAddToCart',
        'as' =>'warehouses.addtocart']);
    Route::get('/reduce/{id}',[
        'uses' => 'WarehouseOrderController@getReducebyOne',
        'as' => 'warehouses.reducebyone'
    ]);
    Route::get('/remove/{id}',[
        'uses' => 'WarehouseOrderController@getRemoveItem',
        'as' => 'warehouses.removeitem'
    ]);
    Route::get('/add/{id}',[
        'uses' => 'WarehouseOrderController@getAddByTen',
        'as' => 'warehouses.addbyten'
    ]);
    Route::get('/shoppingcart', [
        'uses' => 'WarehouseOrderController@getCart',
        'as' => 'warehouses.shoppingcart']);
    Route::get('/checkout',[
        'uses' => 'WarehouseOrderController@getCheckout',
        'as' => 'warehouses.checkout']);
    Route::post('/checkout', 'WarehouseOrderController@postCheckout');
    //warehouse route
    Route::resource('localwarehouse', 'WarehouseController');
    //Order route
    Route::get('/orderinvoice/{id}',[
        'uses' => 'OrderController@orderInvoice',
        'as' => 'order.invoice']);
    Route::get('/orderinvoicelist',[
        'uses' => 'OrderController@orderInvoicelist',
        'as' => 'order.invoicelist']);
    Route::get('/orderinvoiceprint/{id}',[
        'uses' => 'OrderController@orderInvoicePrint',
        'as' => 'order.invoiceprint']);
    Route::post('/delearinvoice/{id}',[
        'uses' => 'OrderController@dealerInvoice',
        'as' => 'dealer.invoice']);
    Route::get('/invoicedetail/{id}',[
        'uses' => 'OrderController@invoiceDetail',
        'as' => 'invoice.detail']);
    Route::get('/dealerinvoiceedit/{id}',[
        'uses' => 'OrderController@invoiceEdit',
        'as' => 'order.invoiceEdit']);
    Route::post('/dealerinvoiceupdate/{id}',[
        'uses' => 'OrderController@invoiceUpdate',
        'as' => 'order.invoiceUpdate']);
    Route::resource('order', 'OrderController');
    //Distribution route
    Route::get('/distributorprint/{id}',[
        'uses' => 'DistributorController@distributorPrint',
        'as' => 'distributor.print']);
    Route::resource('distributor', 'DistributorController');
    //Depo route
    Route::get('/depoInvoiceprint/{id}',[
        'uses' => 'DepoController@depoInvoicePrint',
        'as' => 'depo.depoInvoiceprint']);
    Route::get('/depoInvoiceDetail/{id}',[
        'uses' => 'DepoController@depoInvoiceDetail',
        'as' => 'depoInvoice.detail']);
    Route::get('/depoinvoicelist',[
        'uses' => 'DepoController@depoInvoiceList',
        'as' => 'depo.depoInvoiceList']);
    Route::get('/depoInvoice/{id}',[ 
        'uses' => 'DepoController@depoInvoice',
        'as' => 'depo.invoice']);
    Route::post('/depoInvoice/{id}',[ 
        'uses' => 'DepoController@depoInvoiceStore',
        'as' => 'depo.invoiceStore']);
    Route::resource('depo', 'DepoController');
    //Dealer route
    Route::get('/accountsummary/{id}',[ 
        'uses' => 'DealerController@accountSummary',
        'as' => 'dealer.summary']);
    Route::get('/accountsummaryprint/{id}',[ 
        'uses' => 'DealerController@accountSummaryPrint',
        'as' => 'accountSummary.print']);
    Route::delete('/accountsummarydestroy/{id}',[ 
        'uses' => 'DealerController@summaryDestroy',
        'as' => 'accountSummary.destroy']);
    Route::resource('dealer', 'DealerController');
    //Payment route
    // Route::get('/paymentcreate/{id}',[
    //     'uses' => 'PaymentController@paymentCreate',
    //     'as' => 'payment.creates']);
    // Route::post('/dealerbalance/{id}',[
    //     // 'uses' => 'PaymentController@balance',
    //     // 'as' => 'payment.balance']);
    Route::resource('payment', 'PaymentController');
    // Route::post('/create/{id}',[
    //     'uses' => 'DealerBalanceRecordController@store',
    //     'as' => 'balances.store']);
    //DealerBalanceRecord route 
    Route::get('/dealerbalanceedit/{id}',[
        'uses' => 'DealerBalanceRecordController@balanceEdit',
        'as' => 'balance.balanceEdit']);
    Route::patch('/dealerbalanceupdate/{id}',[
        'uses' => 'DealerBalanceRecordController@balanceUpdate',
        'as' => 'balance.balanceUpdate']);
    Route::get('/dealerbalanceprint/{id}',[
        'uses' => 'DealerBalanceRecordController@balancePrint',
        'as' => 'balance.print']);
    Route::get('/search', 'DealerBalanceRecordController@search');   
    Route::resource('balance', 'DealerBalanceRecordController');
  });

  //Moderator all routes

//   });
 
//TSM all route

Route::group(['middleware' => 'tsm'], function() {
    
  });


//Accounts all routes
Route::get('/accounts', function(){
    echo "Hello Accounts";
})->middleware('accounts');

//Admin all routes
Route::group(['middleware' => 'admin'], function() {    


  });

