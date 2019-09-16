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
//Admin all routes
Route::group(['middleware' => 'admin'], function() {
    //Route::resource('admin','ProductController');
    Route::resource('user','AdminController');
    Route::get('/admin', 'AdminController@admin');
    Route::get('/changeStatus', 'ProductController@changeStatus');
    Route::resource('product', 'ProductController');
    Route::resource('mainwarehouse', 'MainWarehouseController');
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
    
    Route::resource('localwarehouse', 'WarehouseController');
    Route::get('/orderinvoice/{id}',[
        'uses' => 'OrderController@orderInvoice',
        'as' => 'order.invoice']);
    Route::get('/orderinvoicelist',[
        'uses' => 'OrderController@orderInvoicelist',
        'as' => 'order.invoicelist']);
    Route::post('/delearinvoice/{id}',[
        'uses' => 'OrderController@dealerInvoice',
        'as' => 'dealer.invoice']);
    Route::get('/invoicedetail/{id}',[
        'uses' => 'OrderController@invoiceDetail',
        'as' => 'invoice.detail']);
    Route::resource('order', 'OrderController');
    Route::resource('distributor', 'DistributorController');
    // Route::post('/delearspayment/{id}',[
    //     'uses' => 'DealerController@balance',
    //     'as' => 'dealer.balance']);
    Route::resource('dealer', 'DealerController');
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
    Route::resource('balance', 'DealerBalanceRecordController');
  });

  //Moderator all routes
//   Route::group(['middleware' => 'moderator'], function() {
//     //Route::resource('admin','ProductController');
//     Route::get('/moderator', 'ModeratorController@moderator');
//     Route::resource('product', 'ProductController')->except(['edit','delete','update']);
//     Route::resource('mainwarehouse', 'MainWarehouseController')->except(['edit','delete','update']);
//     Route::get('/orderinvoicelist',[
//         'uses' => 'OrderController@orderInvoicelist',
//         'as' => 'order.invoicelist']);
//     Route::get('/invoicedetail/{id}',[
//         'uses' => 'OrderController@invoiceDetail',
//         'as' => 'invoice.detail']);
//     Route::resource('order', 'OrderController');
//     // Route::post('/delearspayment/{id}',[
//     //     'uses' => 'DealerController@balance',
//     //     'as' => 'dealer.balance']);
//     Route::resource('dealer', 'DealerController')->except(['create','edit','delete','update']);
//     // Route::get('/paymentcreate/{id}',[
//     //     'uses' => 'PaymentController@paymentCreate',
//     //     'as' => 'payment.creates']);
//     // Route::post('/dealerbalance/{id}',[
//     //     // 'uses' => 'PaymentController@balance',
//     //     // 'as' => 'payment.balance']);
//     //Route::resource('payment', 'PaymentController');
//     // Route::post('/create/{id}',[
//     //     'uses' => 'DealerBalanceRecordController@store',
//     //     'as' => 'balances.store']);
//     Route::resource('balance', 'DealerBalanceRecordController')->except(['create','edit','delete','update']);
//   });
 
//TSM all route
Route::group(['middleware' => 'tsm'], function() {
    //Route::resource('admin','ProductController');
    Route::get('/tsm', 'TsmController@tsm');
    Route::resource('product', 'ProductController')->except(['edit','delete','update']);
    Route::resource('mainwarehouse', 'MainWarehouseController')->except(['edit','delete','update']);
    Route::get('/orderinvoicelist',[
        'uses' => 'OrderController@orderInvoicelist',
        'as' => 'order.invoicelist']);
    Route::get('/invoicedetail/{id}',[
        'uses' => 'OrderController@invoiceDetail',
        'as' => 'invoice.detail']);
    Route::resource('order', 'OrderController');
    // Route::post('/delearspayment/{id}',[
    //     'uses' => 'DealerController@balance',
    //     'as' => 'dealer.balance']);
    Route::resource('dealer', 'DealerController')->except(['create','edit','delete','update']);
    // Route::get('/paymentcreate/{id}',[
    //     'uses' => 'PaymentController@paymentCreate',
    //     'as' => 'payment.creates']);
    // Route::post('/dealerbalance/{id}',[
    //     // 'uses' => 'PaymentController@balance',
    //     // 'as' => 'payment.balance']);
    //Route::resource('payment', 'PaymentController');
    // Route::post('/create/{id}',[
    //     'uses' => 'DealerBalanceRecordController@store',
    //     'as' => 'balances.store']);
    Route::resource('balance', 'DealerBalanceRecordController')->except(['create','edit','delete','update']);
  });


//Accounts all routes
Route::get('/accounts', function(){
    echo "Hello Accounts";
})->middleware('accounts');

//Viewer all routes
Route::group(['middleware' => 'viewer'], function() {
    //Route::resource('admin','ProductController');
    Route::get('/viewer', 'ViewerController@viewer');
    Route::resource('product', 'ProductController')->except(['create','edit','delete','update']);
    Route::resource('mainwarehouse', 'MainWarehouseController')->except(['create','edit','delete','update']);
    Route::get('/orderinvoicelist',[
        'uses' => 'OrderController@orderInvoicelist',
        'as' => 'order.invoicelist']);
    Route::get('/invoicedetail/{id}',[
        'uses' => 'OrderController@invoiceDetail',
        'as' => 'invoice.detail']);
    Route::resource('order', 'OrderController');
    // Route::post('/delearspayment/{id}',[
    //     'uses' => 'DealerController@balance',
    //     'as' => 'dealer.balance']);
    Route::resource('dealer', 'DealerController')->except(['create','edit','delete','update']);
    // Route::get('/paymentcreate/{id}',[
    //     'uses' => 'PaymentController@paymentCreate',
    //     'as' => 'payment.creates']);
    // Route::post('/dealerbalance/{id}',[
    //     // 'uses' => 'PaymentController@balance',
    //     // 'as' => 'payment.balance']);
    //Route::resource('payment', 'PaymentController');
    // Route::post('/create/{id}',[
    //     'uses' => 'DealerBalanceRecordController@store',
    //     'as' => 'balances.store']);
    Route::resource('balance', 'DealerBalanceRecordController')->except(['create','edit','delete','update']);
  });