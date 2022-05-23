<?php


use App\Http\Controllers\RevisionListController;
use App\Http\Controllers\Report;

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::get('logout', 'Auth\LoginController@logout');

  // Route::get('/', 'JasperInvoiceController@accountadmin');
  Route::get('dailydash', 'JasperInvoiceController@accountadmin');

  Route::get('/', 'OrderController@index');


  // Route::get('/excel/{start-from}/{start-to}', function () {
  //   return Excel::download(new UsersExport(), 'users.xlsx');
  // })->name('excel');

  Route::get('/revision-list', [RevisionListController::class, 'index'])->name('revision-list');
  Route::post('/revision-list-view', [RevisionListController::class, 'show'])->name('revision-list-view');


  // Route::get('/home', 'OrderController@index');
  Route::get('timers', ['uses' => 'FileTimerController@index', 'as' => 'timers.index']);
  //Route::get('home', 'HomeController@index')->name('dashboard');

  //Route::get('/home1', 'HomeController@index1')->name('dashboard1');

  // dashboard routes included on 21-01-2021 by prashant

  Route::get('monthlytotal', 'PrvMonthController@MonthlyTotal')->name('monthlydashboard');

  // dashboard routes included on 21-01-2021 by prashant

  Route::get('totalall', 'CreateChartController@TotalAll');
  Route::get('dailytotal', 'CreateChartController@DailyTotal');

  Route::get('monthlytotal', 'PrvMonthController@MonthlyTotal');

  Route::get('dailytotaltoday', 'CreateChartController@DailyTotal_Today');

  Route::get('dailytotaltoday_d', 'CreateChartController@DailyTotal_Today_D');

  Route::get('dailytotal_d', 'CreateChartController@DailyTotal_D');

  //  invoices routes added on 03-06-21


  Route::get('invoicevectorprint',  'InvoiceController@InvoiceVectorPrint')->name('invoice.print');

  Route::get('invoicedigitprint',  'InvoiceController@InvoiceDigitPrint');


  Route::get('invoicesendemail',  'InvoiceController@InvoiceSendEmail')->name('invoice.sendemail');

  Route::post('invoicesendemail',  'InvoiceController@StoreSendEmail')->name('mail.store');

  // Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['permission:generate.invoice']], function () {
  //     \UniSharp\LaravelFilemanager\Lfm::routes();
  // });

  //Route::get('zipfiles' , 'BackupController@zipFiles')->name('zipfiles');
  // invoices routes added above on 03-06-21

  // dashboard routes ABOVE included on 21-01-2021 by prashant

  Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
  Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
  Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

  //  reports  route  below
  Route::get('allreports', 'OrderController@AllReport');

  Route::post('orderreport', 'JasperInvoiceController@orderreport');

  //Route::get('dailyreport', 'JasperDailyReportController@DailyReportParameters')->middleware('role:core.group');

  Route::get('dailyreport', 'JasperDailyReportController@DailyReportParameters');

  Route::post('dailyreportexec', 'JasperDailyReportController@DailyReportExecute');

  Route::get('dailyreport1', 'JasperDailyReportController@DailyReportParameters1');
  Route::post('dailyreportexec1', 'JasperDailyReportController@DailyReportExecute1');


  Route::get('orderdaterange', 'JasperInvoiceController@orderdaterange')->middleware('permission:confirm.orders.date.range');

  Route::post('orderreport', 'JasperInvoiceController@orderreport');


  Route::get('designer_rangereport', 'JasperDailyReportController@Designer_rangereport');
  Route::post('designerrevenue', 'JasperDailyReportController@DesignerRevenue');





  Route::get('companyorder_param', 'JasperInvoiceController@CompanyOrderParam')->middleware('permission:active.clients.date.range');

  Route::post('companyorder', 'JasperInvoiceController@CompanyOrder');


  Route::get('companynotorder_param', 'JasperInvoiceController@CompanyNotOrderParam')->middleware('permission:inactive.clients.date.range');
  Route::post('companynotorder', 'JasperInvoiceController@CompanyNotOrder');

  //search compeany  for given month checkbox company criteria
  Route::get('jasper/search', 'JasperInvoiceController@search');
  Route::get('checkboxinvoice', 'JasperInvoiceController@CheckBoxInv')->middleware('permission:print.invoice');
  Route::post('inv_option', 'JasperInvoiceController@printinvoice_option');
  Route::get('newclientlist', 'JasperInvoiceController@newclientlist')->middleware('permission:clients.generated.date.range');
  Route::post('clientlist', 'JasperInvoiceController@client_list');



  // search order company by checkbox

  //  search order company by checkbox_datewise

  Route::get('jasper/search_dt', 'JasperInvoiceController@search_dt');
  Route::get('checkboxinvoice_daterange', 'JasperInvoiceController@CheckBoxInv_daterange')->middleware('role:core.group');
  Route::post('inv_date_option', 'JasperInvoiceController@printinvoice_date_option');

  //  search order company by checkbox


  //  inserted below code on 14-01-21

  // New Fix for  Invoice Module


  Route::get('jasperinvoice/data', 'JasperInvoiceController@anyData')->name('jasperinvoice.data');


  Route::get('invoiceyrmonth', 'InvoiceController@InvYrMonth')->middleware('permission:generate.invoice');
  //Route::post('postinvyrmonth', 'JasperInvoiceController@selectorder');
  //removed on  15-11-18

  //Route::post('postinvyrmonth', 'JasperInvoiceController@selectorder');

  //process to create invoice summary table
  Route::post('postinvyrmonth', 'InvoiceController@GenInvoice_new');


  Route::get('invoices-data', array('middleware' => 'auth', 'uses' => 'InvoiceController@anyData'))->name('invoices.data');
  Route::get('invoices', array('middleware' => 'auth', 'uses' => 'InvoiceController@getIndex'));

  // ADDED INVOICES SUMMARY OPTION  
  Route::get('invoice-summary', array('middleware' => 'auth', 'uses' => 'InvoiceSummaryController@SummarygetIndex'))->name('invoice-summary.summarygetindex');

  // new route for testing direct editing
  // added on 12-11-18

  Route::post('invoice-summary/{id}/editdtl',  'InvoiceSummaryController@editdtl')->name('invoices-summary.editdtl');

  Route::patch('invoice-summary/updatedtls',  'InvoiceSummaryController@UpdateDtls')->name('invoices-summary.updatedtls');



  Route::get('invoice-summary/{id}/edit',  'InvoiceSummaryController@edit')->name('invoice-summary.edit');

  Route::PATCH('invoice-summary/updatedtls/{id}',  'InvoiceSummaryController@UpdateDtls')->name('invoices-summary.updatedtls');



  Route::get('invoice-summary1', array('middleware' => 'auth', 'uses' => 'InvoiceSummaryController@SummarygetIndex1'))->name('invoice-summary.summarygetindex1');
  //    changes done above on 14-01-21



  ////  reports route above


  //clients 


  //orders
  Route::get('orders', ['uses' => 'OrderController@index', 'as' => 'orders.index']);

  Route::get('coins', ['uses' => 'OrderController@coin']);
  Route::get('curr_mnth_data', ['uses' => 'OrderController@curr_mnth_data']);

  Route::get('orders/{id}/edit', ['uses' => 'OrderController@edit', 'as' => 'orders.edit']);

  Route::post('orders/{id}/editdtl',  'OrderController@editdtl')->name('orders.editdtl');
  Route::get('orders/create', 'OrderController@create')->name('orders.create');
  Route::post('orders/updatenotes', 'OrderController@updatenotes')
    ->name('orders.updatenotes');
  Route::post('orders/delete_child', 'OrderController@delete_child');

  Route::patch('orders/updatedtl', 'OrderController@updatedtl');
  Route::post('orders/orderdtlstatus', 'OrderController@orderdtlstatus');


  // individual order alloc
  Route::post('orders/updatealloc', 'OrderController@updatealloc')
    ->name('orders.updatealloc');

  // multiple order allocation on 28/08/17
  Route::post('orders/multipleorderalloc', 'OrderController@multipleorderalloc')
    ->name('orders.multipleorderalloc');
  Route::get('orders/search', 'OrderController@search');
  // added below on 31-05-20
  //Route::get('orders/getfile/{orders}', 'OrderController@GetFile')->name('orders.getfile');
  Route::post('orders/updatechildfile', 'OrderController@UpdateChildFile');
  // ->name('orders.updatenotes');  


  //  added below on 26-05-20				


  Route::get('orders/getnotes', 'OrderController@getnotes');

  Route::get('orders/getdesign', 'OrderController@getdesign');


  Route::post('orders/updateorderstatus', 'OrderController@updateorderstatus');

  Route::get('/delayedordersv', 'OrderController@DelayedOrdersv');
  Route::get('/delayedordersd', 'OrderController@DelayedOrdersd');
  Route::get('/delayedordersp', 'OrderController@DelayedOrdersp');
  Route::get('/todayordcomp', 'OrderController@TodayOrdComp');
  Route::post('/searchordcomp', 'OrderController@SearchOrdComp');

  //  timer routes            
  Route::post('orders/updatetimer', 'OrderController@updatetimer')
    ->name('orders.updatetimer');
  Route::post('orders/stoptimer', 'OrderController@stoptimer')
    ->name('orders.stoptimer');



  Route::get('orders/getfiles', 'OrderController@getfiles');
  Route::get('getdelayvalue', 'OrderController@getdelayvalue')->name('order.getdelayvalue');
  Route::post('orders/updateordermisc', 'OrderController@updateordermisc')->name('orders.updateordermisc');
  // timer routes    

  //  above code added on 26-05-20
  Route::resource('orders', 'OrderController');
  // added old controllers and view on 21-03-2020
  //client   
  Route::get('clients/data/{id}', 'ClientController@anyData')->name('clients.data');
  Route::get('clients',  'ClientController@getIndex')->name('clients.index')->middleware('permission:client.create');


  Route::get('clients/{clients}/showcompany', ['uses' => 'ClientController@showcompany', 'as' => 'client.showcompany'])->middleware('permission:print.invoice');

  Route::get('clients/create',  'ClientController@create')->name('clients.create')->middleware('permission:client.create');


  Route::post('clients', 'ClientController@store')->name('clients.store');


  Route::get('clients/{id}/edit',  'ClientController@edit')->name('clients.edit')->middleware('permission:client.update');
  Route::get('clients/{id}/show',  'ClientController@show')->name('clients.show');

  Route::patch('clients/{id}', 'ClientController@update')->name('clients.update');

  Route::get('clients/{id}/updateclientdtl', 'ClientController@UpdateClientDtl')->name('clients.updateclientdtl');

  Route::get('clients/getcompanynm', 'ClientController@GetCompanyNm');
  Route::get('clients/getrelatedcomp', 'ClientController@GetRelatedComp');
  Route::get('clients/getemailforupd', 'ClientController@getemailforupd');
  Route::post('clients/getemail', 'ClientController@getemail');
  Route::post('clients/getphone', 'ClientController@getphone');
  Route::post('getstatename', ['uses' => 'ClientController@statename', 'as' => 'get.statename']);
  Route::post('getcityname', ['uses' => 'ClientController@cityname', 'as' => 'get.cityname']);
  Route::post('clients/compdtl', 'ClientController@compdtl');

  Route::get('clientrelatedtocompany/{id}', ['uses' => 'ClientController@relatedclients', 'as' => 'company.relatedclients']);
  Route::get('workseatrelatedtocompany/{id}', ['uses' => 'ClientController@relatedworkseat', 'as' => 'company.relatedworkseat']);
  //clientdtl
  Route::post('addnewclient', ['uses' => 'ClientController@addnewclient', 'as' => 'clients.addnewclient']);
  Route::get('showclient/{id}', ['uses' => 'ClientController@showclient', 'as' => 'clientdtl.showclient']);
  Route::get('editclient/{id}', ['uses' => 'ClientController@editclient', 'as' => 'clientdtl.editclient']);

  Route::post('updateclient', ['uses' => 'ClientController@updateclient', 'as' => 'clientdtl.updateclient']);
  //workseat route
  Route::get('createworkseat/{id}', ['uses' => 'ClientController@createworkseat', 'as' => 'workseat.createworkseat']);
  Route::post('workseatstore', ['uses' => 'ClientController@workseatstore', 'as' => 'workseat.workseatstore']);
  Route::get('editworkseat/{id}', ['uses' => 'ClientController@editworkseat', 'as' => 'workseat.editworkseat']);
  Route::get('showworkseat/{id}', ['uses' => 'ClientController@showworkseat', 'as' => 'workseat.showworkseat']);
  Route::post('updateworkseat', ['uses' => 'ClientController@updateworkseat', 'as' => 'workseat.updateworkseat']);
  Route::post('deleteworkseat', ['uses' => 'ClientController@deleteworkseat', 'as' => 'workseat.deleteworkseat']);
  //  added above controllers and view on 21-03-2020		
  //users
  Route::get('users', ['uses' => 'UserController@index', 'as' => 'user.index'])->middleware('permission:user.show');
  Route::get('disableusers', ['uses' => 'UserController@disableuser', 'as' => 'user.disableuser'])->middleware('permission:user.show');
  Route::get('allusers', ['uses' => 'UserController@alluser', 'as' => 'user.alluser'])->middleware('permission:user.show');
  Route::get('liveusers', ['uses' => 'UserController@liveuser', 'as' => 'user.liveuser'])->middleware('permission:user.show');

  Route::get('userview/{id}', ['uses' => 'UserController@view', 'as' => 'user.view'])->middleware('permission:user.show');
  Route::get('adduser', ['uses' => 'UserController@create', 'as' => 'user.create'])->middleware('permission:user.create');
  Route::post('storeuser', ['uses' => 'UserController@store', 'as' => 'user.store']);
  Route::get('userselect', ['uses' => 'UserController@select', 'as' => 'user.select']);

  Route::get('userroledata', ['uses' => 'UserController@rolesdata', 'as' => 'user.rolesdata']);
  Route::get('userdata/{id}', ['uses' => 'UserController@useredit', 'as' => 'user.useredit'])->middleware('permission:user.update');
  Route::get('userdelete', ['uses' => 'UserController@userdelete', 'as' => 'user.userdelete']);
  Route::post('userupdatedata', ['uses' => 'UserController@userupdate', 'as' => 'user.userupdate']);
  Route::post('updatepass', 'UserController@updatepassword')->name('users.changepass');

  //Route::get('/home', 'HomeController@index')->name('home');


  //Activitylog
  Route::get('activitylog', ['uses' => 'Activity@index', 'as' => 'avtivity.index'])->middleware('permission:view.logs');

  //role
  Route::get('role', ['uses' => 'RoleController@index', 'as' => 'role.index'])->middleware('permission:role.list');
  Route::post('storerole', ['uses' => 'RoleController@store', 'as' => 'role.store']);
  Route::get('roledata', ['uses' => 'RoleController@anydata', 'as' => 'role.anydata']);
  Route::get('addrole', ['uses' => 'RoleController@create', 'as' => 'role.create'])->middleware('permission:role.create');
  Route::get('editroledata/{id}', ['uses' => 'RoleController@edit', 'as' => 'role.edit'])->middleware('permission:role.modify');
  Route::post('updaterole', ['uses' => 'RoleController@update', 'as' => 'role.update']);
  Route::get('deleterole', ['uses' => 'RoleController@destroy', 'as' => 'role.destroy']);
  Route::get('viewroledata/{id}', ['uses' => 'RoleController@view', 'as' => 'role.view'])->middleware('permission:role.list');
  //permission
  Route::get('permission', ['uses' => 'PermissionController@index', 'as' => 'permission.index'])->middleware('permission:role.list');
  Route::get('permissiondata', ['uses' => 'PermissionController@anydata', 'as' => 'permission.anydata']);
  Route::post('storepermission', ['uses' => 'PermissionController@store', 'as' => 'permission.store'])->middleware('permission:role.create');
  Route::post('updatepermission', ['uses' => 'PermissionController@update', 'as' => 'permission.update'])->middleware('permission:role.modify');
  Route::get('deletepermission', ['uses' => 'PermissionController@destroy', 'as' => 'permission.destroy']);






  //show profile
  Route::get('showprofile', ['uses' => 'UserController@showprofile', 'as' => 'user.showprofile']);
  Route::post('updateprofile', ['uses' => 'UserController@updateprofile', 'as' => 'user.updateprofile']);

  //set theme color route
  Route::get('setcolortheme', 'UserController@setcolortheme');
  Route::get('maxminsidebar', 'UserController@maxminsidebar');

  // missed routes added on 04-02-2021

  Route::post('gmails/fetchcomp', 'GmailController@fetchcomp');
  //monthly dashboard controller
  //Route::get('monthdashboard',['uses'=>'DashboardController@monthdashboard','as'=>'monthdashboard.monthdashboard'])->middleware('permission:monthly.dashboard');
  //Route::get('ajaxmonthdashboard',['uses'=>'DashboardController@ajaxmonthdashboard','as'=>'monthdashboard.ajaxmonthdashboard']);
  //Route::get('graphmonthdashboard',['uses'=>'DashboardController@graphmonthdashboard','as'=>'monthdashboard.graphmonthdashboard']);
  //Route::get('ajaxweekdashboard',['uses'=>'DashboardController@ajaxweekdashboard','as'=>'monthdashboard.ajaxweekdashboard']);

  Route::get('monthdashboard', ['uses' => 'DashboardController@monthdashboard', 'as' => 'monthdashboard.monthdashboard'])->middleware('permission:monthly.dashboard');
  Route::get('weeklydashboard', ['uses' => 'DashboardController@weeklydashboard', 'as' => 'monthdashboard.weeklydashboard'])->middleware('permission:monthly.dashboard');

  Route::get('ajaxmonthdashboard', ['uses' => 'DashboardController@ajaxmonthdashboard', 'as' => 'monthdashboard.ajaxmonthdashboard']);
  Route::get('graphmonthdashboard', ['uses' => 'DashboardController@graphmonthdashboard', 'as' => 'monthdashboard.graphmonthdashboard']);
  Route::get('ajaxweekdashboard', ['uses' => 'DashboardController@ajaxweekdashboard', 'as' => 'monthdashboard.ajaxweekdashboard']);
  Route::get('graphweeklydashboard', ['uses' => 'DashboardController@graphweeklydashboard', 'as' => 'monthdashboard.graphweeklydashboard']);

  //  above dashboard for monthly and weekly added on 10-feb-2022

  //workseat
  Route::get('viewworkseats', ['uses' => 'WorkseatController@viewworkseat', 'as' => 'workseat.viewworkseat']);
  Route::get('viewworkseatuser/{id}', ['uses' => 'WorkseatController@viewworkseatuser', 'as' => 'workseat.viewworkseatuser']);
  Route::get('viewworkseatuserajax/{id}', ['uses' => 'WorkseatController@viewworkseatuserajax', 'as' => 'workseat.viewworkseatuserajax']);

  Route::get('viewworkseatscompany/{id}', ['uses' => 'WorkseatController@viewworkseatcompany', 'as' => 'workseat.viewworkseatcompany']);
  Route::get('showworkseatoperations/{id}', ['uses' => 'WorkseatController@showworkseatoperations', 'as' => 'workseat.showworkseatoperations']);
  Route::get('showclientdtloperations/{id}', ['uses' => 'WorkseatController@showclientdtloperations', 'as' => 'workseat.showclientdtloperations']);
  Route::get('workseatgraphics', ['uses' => 'WorkseatController@workseatgraphics', 'as' => 'workseatgraphics']);
  //user summary 
  Route::get('userworkseatsummary', ['uses' => 'WorkseatController@userworkseatsummary', 'as' => 'workseat.userworkseatsummary']);

/**
 * 
 *    Report routing
 */
Route::prefix('report')->group(function () {
  /**
   *    Date Range View page
   */
  Route::get('targetrange', [Report\OrderController::class,'targetDateRange'])->name('daterange-miss-target');

  /**
   *    Missing order target report
   */

  Route::post('targetreport', [Report\OrderController::class,'missedTargetReport'])->name('order-miss-target');

});


});



