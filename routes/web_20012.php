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

Auth::routes();

Route::get('logout', 'Auth\LoginController@logout');

// Route::get('/', 'JasperInvoiceController@accountadmin');
// Route::get('home', 'JasperInvoiceController@accountadmin');

Route::get('/', 'OrderController@index');
Route::get('home', 'OrderController@index');

//Route::get('home', 'HomeController@index')->name('dashboard');

//Route::get('/home1', 'HomeController@index1')->name('dashboard1');

Route::get('monthlytotal', 'PrvMonthController@MonthlyTotal')->name('monthlydashboard');


Route::get('/', function () {

    return view('auth.login');
});


Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::patch('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::patch('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

//  reports  route  below
  Route::get('allreports', 'OrderController@AllReport');

Route::get('orderdaterange', 'JasperInvoiceController@orderdaterange')->middleware('role:core.group');

Route::post('orderreport', 'JasperInvoiceController@orderreport');

//Route::get('dailyreport', 'JasperDailyReportController@DailyReportParameters')->middleware('role:core.group');

Route::get('dailyreport', 'JasperDailyReportController@DailyReportParameters');

Route::post('dailyreportexec', 'JasperDailyReportController@DailyReportExecute');

Route::get('dailyreport1', 'JasperDailyReportController@DailyReportParameters1');
Route::post('dailyreportexec1', 'JasperDailyReportController@DailyReportExecute1');


Route::get('orderdaterange', 'JasperInvoiceController@orderdaterange');

Route::post('orderreport', 'JasperInvoiceController@orderreport');



Route::get('companyorder_param', 'JasperInvoiceController@CompanyOrderParam');

Route::post('companyorder', 'JasperInvoiceController@CompanyOrder');


Route::get('companynotorder_param', 'JasperInvoiceController@CompanyNotOrderParam');
Route::post('companynotorder', 'JasperInvoiceController@CompanyNotOrder');

//search compeany  for given month checkbox company criteria
Route::get('jasper/search', 'JasperInvoiceController@search');
Route::get('checkboxinvoice', 'JasperInvoiceController@CheckBoxInv');
Route::post('inv_option', 'JasperInvoiceController@printinvoice_option');
Route::get('newclientlist', 'JasperInvoiceController@newclientlist');
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


Route::get('invoiceyrmonth', 'InvoiceController@InvYrMonth');
//Route::post('postinvyrmonth', 'JasperInvoiceController@selectorder');
   //removed on  15-11-18

//Route::post('postinvyrmonth', 'JasperInvoiceController@selectorder');

//process to create invoice summary table
Route::post('postinvyrmonth', 'InvoiceController@GenInvoice');


Route::get('invoices-data', array('middleware' => 'auth', 'uses' => 'InvoiceController@anyData'))->name('invoices.data');
Route::get('invoices', array('middleware' => 'auth', 'uses' => 'InvoiceController@getIndex'));

// ADDED INVOICES SUMMARY OPTION  
Route::get('invoice-summary-data', array('middleware' => 'auth', 'uses' => 'InvoiceSummaryController@SummaryanyData'))->name('invoices-summary.data');
Route::get('invoice-summary', array('middleware' => 'auth', 'uses' => 'InvoiceSummaryController@SummarygetIndex'));

// new route for testing direct editing
// added on 12-11-18

Route::post('invoice-summary/{id}/editdtl',  'InvoiceSummaryController@editdtl')->name('invoices-summary.editdtl');

Route::patch('invoice-summary/updatedtls',  'InvoiceSummaryController@UpdateDtls')->name('invoices-summary.updatedtls');



Route::get('invoice-summary/{id}/edit',  'InvoiceSummaryController@edit')->name('invoice-summary.edit');

Route::PATCH('invoice-summary/updatedtls/{id}',  'InvoiceSummaryController@UpdateDtls')->name('invoices-summary.updatedtls');


//    changes done above on 14-01-21



////  reports route above


//clients 
Route::get('clients', ['uses'=>'ClientMasterController@index', 'as'=>'client.index']);


Route::get('clients/{clients}/showcompany', ['uses'=>'ClientController@showcompany', 'as'=>'client.showcompany']);

//orders
   Route::get('orders', ['uses'=>'OrderController@index', 'as'=>'orders.index']);

   Route::get('coins', ['uses'=>'OrderController@coin']);
   Route::get('curr_mnth_data', ['uses'=>'OrderController@curr_mnth_data']);

        Route::get('orders/{id}/edit', ['uses'=>'OrderController@edit', 'as'=>'orders.edit']);

        Route::post('orders/{id}/editdtl',  'OrderController@editdtl')->name('orders.editdtl');
        Route::get('orders/create', 'OrderController@create')->name('orders.create');
		Route::post('orders/updatenotes', 'OrderController@updatenotes')
                ->name('orders.updatenotes');  
    Route::post('orders/delete_child', 'OrderController@delete_child');  

Route::patch('orders/updatedtl', 'OrderController@updatedtl');Route::post('orders/orderdtlstatus', 'OrderController@orderdtlstatus');
             

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

Route::get('/delayedordersv', 'OrderController@DelayedOrdersv');Route::get('/delayedordersd','OrderController@DelayedOrdersd');Route::get('/delayedordersp', 'OrderController@DelayedOrdersp'); Route::get('/todayordcomp', 'OrderController@TodayOrdComp');Route::post('/searchordcomp', 'OrderController@SearchOrdComp');  

  //  timer routes            
  Route::post('orders/updatetimer', 'OrderController@updatetimer')
                ->name('orders.updatetimer');   
  Route::post('orders/stoptimer', 'OrderController@stoptimer')
                ->name('orders.stoptimer');   

  

Route::get('orders/getfiles', 'OrderController@getfiles');
             
  // timer routes    

//  above code added on 26-05-20
Route::resource('orders', 'OrderController');		
 // added old controllers and view on 21-03-2020
     
     Route::get('clients/data', 'ClientController@anyData')->name('clients.data');
    
Route::get('clients',  'ClientController@getIndex')->name('clients.index');

Route::get('clients/create',  'ClientController@create')->name('clients.create');

Route::post('clients', 'ClientController@store')->name('clients.store');

Route::get('clients/{id}/edit',  'ClientController@edit')->name('clients.edit');

Route::patch('clients/{id}', 'ClientController@update')->name('clients.update');

Route::get('clients/{id}/updateclientdtl', 'ClientController@UpdateClientDtl')->name('clients.updateclientdtl');

    //  added above controllers and view on 21-03-2020		
//users
Route::get('users', ['uses'=>'UserController@index', 'as'=>'user.index']);
Route::get('userview/{id}', ['uses'=>'UserController@view', 'as'=>'user.view']);
Route::get('adduser', ['uses'=>'UserController@create', 'as'=>'user.create']);
Route::post('storeuser', ['uses'=>'UserController@store', 'as'=>'user.store']);
Route::get('userlist', ['uses'=>'UserController@list', 'as'=>'showuser.list']);
Route::get('userselect', ['uses'=>'UserController@select', 'as'=>'user.select']);
Route::post('assignuserlead',['uses'=>'UserController@userassign','as'=>'lead.userassign']);
Route::get('userroledata',['uses'=>'UserController@rolesdata','as'=>'user.rolesdata']);
Route::get('userdata/{id}',['uses'=>'UserController@useredit','as'=>'user.useredit']);
Route::get('userdelete',['uses'=>'UserController@userdelete','as'=>'user.userdelete']);
Route::post('userupdatedata',['uses'=>'UserController@userupdate','as'=>'user.userupdate']);
Route::post('updatepass', 'UserController@updatepassword')->name('users.changepass');

//Route::get('/home', 'HomeController@index')->name('home');


//Activitylog
Route::get('activitylog', ['uses'=>'Activity@index', 'as'=>'avtivity.index'])->middleware('permission:view.logs');
Route::get('activitydata', ['uses'=>'CompanyMasterController@anydataactivity', 'as'=>'activity.anydataactivity']);
Route::get('companylogdata/{id}',['uses'=>'LeadController@companylog', 'as'=>'lead.companylog']);

//role
Route::get('role', ['uses'=>'RoleController@index', 'as'=>'role.index']);
Route::post('storerole', ['uses'=>'RoleController@store', 'as'=>'role.store']);
Route::get('roledata', ['uses'=>'RoleController@anydata', 'as'=>'role.anydata']);
Route::get('addrole', ['uses'=>'RoleController@create', 'as'=>'role.create']);
Route::get('editroledata/{id}', ['uses'=>'RoleController@edit', 'as'=>'role.edit']);
Route::post('updaterole', ['uses'=>'RoleController@update', 'as'=>'role.update']);
Route::get('deleterole', ['uses'=>'RoleController@destroy', 'as'=>'role.destroy']);
Route::get('viewroledata/{id}', ['uses'=>'RoleController@view', 'as'=>'role.view']);
//permission
Route::get('permission', ['uses'=>'PermissionController@index', 'as'=>'permission.index']);
Route::get('permissiondata', ['uses'=>'PermissionController@anydata', 'as'=>'permission.anydata']);
Route::post('storepermission', ['uses'=>'PermissionController@store', 'as'=>'permission.store']);
Route::post('updatepermission',['uses'=>'PermissionController@update','as'=>'permission.update']);
Route::get('deletepermission', ['uses'=>'PermissionController@destroy', 'as'=>'permission.destroy']);

//calander
Route::get('events', 'EventController@index')->name("events1");
//Route::get('localevents', 'EventController@localeventindex')->name("localeventindex1");
Route::get('checkevents', 'EventController@index1')->name("events2");
Route::post('events/store' , 'EventController@store')->name('event.store');
Route::post('events/update' , 'EventController@update')->name('event.update');
Route::post('events/delete' , 'EventController@delete')->name('event.delete');
Route::post('events/storelocalevent' , 'EventController@storelocalevent')->name('event.storelocalevent');
Route::post('events/updatelocalevent' , 'EventController@updatelocalevent')->name('event.updatelocalevent');
Route::post('events/localeventdelete' , 'EventController@localeventdelete')->name('event.localeventdelete');
Route::post('events/localattendeemaildelete' , 'EventController@localattendeemaildelete')->name('event.localattendeemaildelete');
Route::post('eventuserdetail' , 'EventController@userdetail')->name('events.userdetail');
// Route::post('events/event_clicks', 'EventController@store');
Route::post('attanddeleteuser', 'EventController@attendemaildelete')->name("event.attendemaildelete");

Route::get('events/event_collect', 'EventController@Event_Collect');

Route::get('events/event_clicks/1', 'EventController@CallMethod');
Route::post('/useremails', 'EventController@useremail');
Route::post('/guestemails', 'EventController@guestemail');
Route::post('/emailsinfo', 'EventController@emailinfo')->name('event.emailinfo');

//Route::resource('meetings', 'MeetingController');

//Route::post('meetings/search', 'MeetingController@search')->name("meetings.search");


//calander
//Route::resource('gcalendar', 'gCalendarController');
//Route::post('gcalendarup', 'gCalendarController@update1')->name('gcalendar.update1');
//Route::post('gcalendarup/delete' , 'gCalendarController@delete')->name('gcalendar.delete');

//Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'gCalendarController@oauth']);
// Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'gCalendarController@oauth']);
//Route::get('oauth2callback', 'gCalendarController@zoho');
//Route::get('inserteventzoho', 'gCalendarController@zoho1');

//notification message
//Route::post('message', 'EventController@notificationmessage')->name('show.notificationmessage');
//Route::post('shownomessage', 'EventController@readnotificationmessage')->name('read.readnotificationmessage');
//Route::get('redmore',['uses'=>'NotificationController@morenotification','as'=>'show.morenotification']);
//Route::get('notificationannydata',['uses'=>'NotificationController@anydata','as'=>'notification.anydata']);

//show profile
//Route::get('showprofile',['uses'=>'UserController@showprofile','as'=>'user.showprofile']); 
//Route::post('updateprofile',['uses'=>'UserController@updateprofile','as'=>'user.updateprofile']); 

//set theme color route
Route::get('setcolortheme','UserController@setcolortheme');

//Route::group(['middleware' => 'auth'], function () {
//	Route::get('{page}', ['as' => 'page.index', 'uses' => 'PageController@index']);
//});


 
 
