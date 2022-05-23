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
Route::get('/asd', function () {

    return view('welcome');
});

Route::get('/', function () {

    return view('auth.login');
});
Route::get('maskasread', function () {
  auth()->user()->unreadNotifications->markAsRead();
    return redirect()->back();
})->name('markread');
Route::get('fullcal',['uses'=>'EventController@fullcalander','as'=>'full.fullcalander']);
Route::get('patternscrm',function(){
   return view('frontdashboard.front.view');
})->middleware('auth');

//candidate form
Route::get('showcandidateform', ['uses'=>'MailController@candi', 'as'=>'mail.candi']);
Route::post('storecandidatedata',['uses'=>'MailController@candidatestore', 'as'=>'mail.candidatestore']);
Route::get('candidateform1', ['uses'=>'MailController@candidateform1', 'as'=>'form.candidateform1']);
Route::get('candidateformnew', ['uses'=>'MailController@candidateformnew', 'as'=>'form.candidateformnew']);
Route::get('doubleboxform', ['uses'=>'MailController@doubleboxform', 'as'=>'form.doubleboxform']);
Route::post('indiacityname',['uses'=>'MailController@indiacityname', 'as'=>'mail.indiacityname']);
Route::get('candidaterecord', ['uses'=>'MailController@viewcandidate', 'as'=>'mail.viewcandidate']);
Route::get('anydatacandidate', ['uses'=>'MailController@anydatacandidate', 'as'=>'mail.anydatacandidate']);
Route::get('showcandidate/{id}',['uses'=>'MailController@showcandidate','as'=>'candidate.showcandidate']);

//generate report route
Route::get('showreport',['uses'=>'ReportController@showreport','as'=>'show.showreport']);
Route::post('generateallcompanydispositionreport',['uses'=>'ReportController@allcomapnydispositionreport','as'=>'generate.allcomapnydispositionreport']);


//3cx mail controller
Route::get('3cx', ['uses'=>'ThreecxController@index', 'as'=>'threecx.index']);
//mail 
Route::get('mail', ['uses'=>'MailController@index', 'as'=>'mail.index'])->middleware('permission:view.email');
Route::get('anydatamail', ['uses'=>'MailController@anydata', 'as'=>'mail.anydata']);
Route::get('createmail', ['uses'=>'MailController@create', 'as'=>'mail.create'])->middleware('permission:create.email');
Route::get('writemail/{id}', ['uses'=>'MailController@write', 'as'=>'mail.write']);
Route::post('storemail', ['uses'=>'MailController@store', 'as'=>'mail.store']);
Route::get('showemail/{id}', ['uses'=>'MailController@show', 'as'=>'mail.show']);
Route::get('editemail/{id}', ['uses'=>'MailController@edit', 'as'=>'mail.edit']);
Route::post('updateemail', ['uses'=>'MailController@update', 'as'=>'mail.update']);
Route::get('sendemail/{id}', ['uses'=>'MailController@send', 'as'=>'mail.send']);
Route::get('deleteemail', ['uses'=>'MailController@delete', 'as'=>'mail.delete']);
//leads
Route::get('leads', ['uses'=>'LeadController@index', 'as'=>'lead.index'])->middleware('permission:view.lead');
Route::get('leaddata', ['uses'=>'LeadController@anydata', 'as'=>'lead.anydata']);
Route::get('addleads', ['uses'=>'LeadController@create', 'as'=>'lead.create'])->middleware('permission:create.lead');
Route::post('storeleads', ['uses'=>'LeadController@store', 'as'=>'lead.store']);
Route::get('editleads/{id}/{backto}', ['uses'=>'LeadController@edit', 'as'=>'lead.edit'])->middleware('permission:edit.lead');
//Route::get('editdata/{id}', ['uses'=>'LeadController@tableedit', 'as'=>'lead.tableedit']);
Route::get('leaddatas/{id}/{backto}', ['uses'=>'LeadController@show', 'as'=>'lead.show']);
Route::post('updatelead', ['uses'=>'LeadController@update', 'as'=>'lead.update']);
Route::get('leadphone/{id}', ['uses'=>'LeadController@phonedelete', 'as'=>'lead.phonedelete']);
Route::get('leademail/{id}', ['uses'=>'LeadController@emaildelete', 'as'=>'lead.emaildelete']);

//clients 
Route::get('clients', ['uses'=>'ClientMasterController@index', 'as'=>'client.index'])->middleware('permission:view.client');
Route::post('storeclient', ['uses'=>'ClientMasterController@store', 'as'=>'client.store']);
Route::get('addclient/{id}', ['uses'=>'ClientMasterController@create', 'as'=>'client.create'])->middleware('permission:create.client');
Route::get('clientdata', ['uses'=>'ClientMasterController@anydata', 'as'=>'client.anydata']);
Route::get('showclientdata/{id}/{backto}', ['uses'=>'ClientMasterController@show', 'as'=>'client.show']);

Route::get('editclientdata/{id}/{backto}', ['uses'=>'ClientMasterController@edit', 'as'=>'client.edit'])->middleware('permission:edit.client');
Route::post('updateclient', ['uses'=>'ClientMasterController@update', 'as'=>'client.update']);
Route::get('clientphone/{id}', ['uses'=>'ClientMasterController@phonedelete', 'as'=>'client.phonedelete']);
Route::get('clientemail/{id}', ['uses'=>'ClientMasterController@emaildelete', 'as'=>'client.emaildelete']);


Route::get('clientlog/{id}', ['uses'=>'ClientMasterController@activitylog', 'as'=>'client.activitylog']);
Route::post('isexistcheck', ['uses'=>'ClientMasterController@isexist', 'as'=>'client.isexist']);



//disposition
Route::post('prestoreclientdisposition', ['uses'=>'ClientdispositionController@predispositionentry', 'as'=>'clientdisposition.predispositionentry']);
Route::post('storeclientdisposition', ['uses'=>'ClientdispositionController@store', 'as'=>'clientdisposition.store']);
Route::post('prestorecompanydisposition', ['uses'=>'ClientdispositionController@predispositionentrycompany', 'as'=>'companydisposition.predispositionentrycompany']);
Route::post('storecompanydisposition', ['uses'=>'ClientdispositionController@companydispositionstore', 'as'=>'disposition.companydispositionstore']);
Route::get('dispositionrecord', ['uses'=>'ClientdispositionController@record', 'as'=>'dispostion.record']);
Route::get('dashboard', ['uses'=>'ClientdispositionController@index', 'as'=>'dashboard.index']);
Route::post('storeclienttaskdisposition', ['uses'=>'ClientdispositionController@taskstore', 'as'=>'clientdisposition.taskstore']);
Route::post('storecompanytaskdisposition', ['uses'=>'ClientdispositionController@companytaskdispositionstore', 'as'=>'disposition.companytaskdispositionstore']);
Route::get('clientdispositionlog/{id}', ['uses'=>'ClientdispositionController@clientdispositionlog', 'as'=>'client.clientdispositionlog']);
Route::get('companyclientdispositionlog/{id}', ['uses'=>'ClientdispositionController@companyclientdispositionlog', 'as'=>'client.companyclientdispositionlog']);
Route::get('companydispositionlog/{id}', ['uses'=>'ClientdispositionController@companydispositionlog', 'as'=>'company.companydispositionlog']);
Route::get('showdatacompanyindisposition', ['uses'=>'ClientdispositionController@showdatacompanyindisposition', 'as'=>'company.showdatacompanyindisposition']);
Route::get('editcompanyfromdisposition', ['uses'=>'ClientdispositionController@editcompanyfromdisposition', 'as'=>'company.editcompanyfromdisposition']);
Route::get('showdataclientindisposition', ['uses'=>'ClientdispositionController@showdataclientindisposition', 'as'=>'client.showdataclientindisposition']);
Route::post('modalcompanydataedit', ['uses'=>'ClientdispositionController@companydataedit', 'as'=>'modal1.companydataedit']);

Route::get('editclientfromdisposition', ['uses'=>'ClientdispositionController@editclientfromdisposition', 'as'=>'client.editclientfromdisposition']);
Route::post('clientdataedit', ['uses'=>'ClientdispositionController@clientdataedit', 'as'=>'modal1.clientdataedit']);

//company or account
Route::get('company', ['uses'=>'CompanyMasterController@index', 'as'=>'company.index'])->middleware('permission:view.company');
Route::get('addcompany', ['uses'=>'CompanyMasterController@create', 'as'=>'company.create'])->middleware('permission:create.company');
Route::post('storecompany', ['uses'=>'CompanyMasterController@store', 'as'=>'company.store']);
Route::get('companydata', ['uses'=>'CompanyMasterController@anydata', 'as'=>'company.anydata']);
Route::get('showcompanydata/{id}/{backto}', ['uses'=>'CompanyMasterController@show', 'as'=>'company.show']);
Route::get('editcompanydata/{id}/{backto}', ['uses'=>'CompanyMasterController@edit', 'as'=>'company.edit'])->middleware('permission:edit.company');
Route::post('updatecompany', ['uses'=>'CompanyMasterController@update', 'as'=>'company.update']);
Route::get('assigncompany', ['uses'=>'CompanyMasterController@showassigncompany', 'as'=>'company.showassigncompany'])->middleware('role:admin|bde');
Route::get('assigncompanydata', ['uses'=>'CompanyMasterController@asssignanydata', 'as'=>'company.asssignanydata']);
Route::get('unassigncompany', ['uses'=>'CompanyMasterController@showunassigncompany', 'as'=>'company.showunassigncompany'])->middleware('role:admin|bde'); 
Route::get('unassigncompanydata', ['uses'=>'CompanyMasterController@unasssignanydata', 'as'=>'company.unasssignanydata']);


// Route::get('editcompanydata/{id}', ['uses'=>'CompanyMasterController@index', 'as'=>'company.tableedit']);

Route::get('companyphone/{id}', ['uses'=>'CompanyMasterController@phonedelete', 'as'=>'company.phonedelete']);
Route::get('companyemail/{id}', ['uses'=>'CompanyMasterController@emaildelete', 'as'=>'company.emaildelete']);

Route::get('companylist', ['uses'=>'CompanyMasterController@list', 'as'=>'showcompany.list']);

Route::get('clientrelatedtocompany/{id}', ['uses'=>'CompanyMasterController@relatedclients', 'as'=>'company.relatedclients']);
Route::post('companyimport', ['uses'=>'CompanyMasterController@import', 'as'=>'company.import']);
Route::post('/getcompanyname', 'CompanyMasterController@getname');
Route::post('/namecheck', ['uses'=>'CompanyMasterController@nameexist', 'as'=>'company.nameexist']);

Route::post('getstatename', ['uses'=>'CompanyMasterController@statename', 'as'=>'get.statename']);
Route::post('getcityname', ['uses'=>'CompanyMasterController@cityname', 'as'=>'get.cityname']);
Route::post('relatedclientdeletes', ['uses'=>'CompanyMasterController@relatedclientdelete', 'as'=>'company.relatedclientdelete']);
Route::post('assignuserfromtable',['uses'=>'CompanyMasterController@assignuserfromtable','as'=>'company.assignuserfromtable']);
Route::post('iscompanyexistcheck', ['uses'=>'CompanyMasterController@isexist', 'as'=>'company.isexist']);
Route::post('showemail', ['uses'=>'CompanyMasterController@showemail', 'as'=>'company.showemail']);
//users
Route::get('users', ['uses'=>'UserController@index', 'as'=>'user.index'])->middleware('permission:view.users');
Route::get('adduser', ['uses'=>'UserController@create', 'as'=>'user.create'])->middleware('permission:create.users');
Route::post('storeuser', ['uses'=>'UserController@store', 'as'=>'user.store']);
Route::get('userlist', ['uses'=>'UserController@list', 'as'=>'showuser.list']);
Route::get('userselect', ['uses'=>'UserController@select', 'as'=>'user.select']);
Route::post('assignuserlead',['uses'=>'UserController@userassign','as'=>'lead.userassign']);
Route::get('userroledata',['uses'=>'UserController@rolesdata','as'=>'user.rolesdata']);
Route::get('userdata/{id}',['uses'=>'UserController@useredit','as'=>'user.useredit'])->middleware('permission:edit.users');
Route::get('userdelete',['uses'=>'UserController@userdelete','as'=>'user.userdelete']);
Route::post('userupdatedata',['uses'=>'UserController@userupdate','as'=>'user.userupdate']);
Route::get('/home', 'HomeController@index')->name('home');


//user info related to company disposition and other information
Route::get('/usersummaryinfo', 'UsersummaryController@index')->name('userinfo.index')->middleware('permission:view.users');
Route::get('usersummaryanydata', ['uses'=>'UsersummaryController@anydata', 'as'=>'usersummary.anydata']);
Route::get('usercurrentlyallocatedcompany',['uses'=>'UsersummaryController@currnetlyallocated','as'=>'user.currnetlyallocated']);
Route::get('usertotalallocatedcompany',['uses'=>'UsersummaryController@totalallocated','as'=>'user.totalallocated']);
Route::get('userunallocatedcompany',['uses'=>'UsersummaryController@unallocated','as'=>'user.unallocated']);

Route::get('currentlyallcatedcompanyname',['uses'=>'UsersummaryController@currentlyallcatedcompanyname','as'=>'user.currentlyallcatedcompanyname']);
Route::get('unallcatedcompanyname',['uses'=>'UsersummaryController@unallcatedcompanyname','as'=>'user.unallcatedcompanyname']);

Route::get('totalallcatedcompanyname',['uses'=>'UsersummaryController@totalallcatedcompanyname','as'=>'user.totalallcatedcompanyname']);
Route::get('currentlyassigndisposition',['uses'=>'UsersummaryController@currentlyassigndisposition','as'=>'user.currentlyassigndisposition']);
Route::get('usersdispositioninfo', 'UsersummaryController@usercompanywisedisposition')->name('userinfo.usercompanywisedisposition');


//Activitylog
Route::get('activitylog', ['uses'=>'Activity@index', 'as'=>'avtivity.index'])->middleware('permission:view.logs');
Route::get('activitydata', ['uses'=>'CompanyMasterController@anydataactivity', 'as'=>'activity.anydataactivity']);
Route::get('companylogdata/{id}',['uses'=>'LeadController@companylog', 'as'=>'lead.companylog']);

//role
Route::get('role', ['uses'=>'RoleController@index', 'as'=>'role.index'])->middleware('permission:view.role');
Route::post('storerole', ['uses'=>'RoleController@store', 'as'=>'role.store']);
Route::get('roledata', ['uses'=>'RoleController@anydata', 'as'=>'role.anydata']);
Route::get('addrole', ['uses'=>'RoleController@create', 'as'=>'role.create'])->middleware('permission:create.role');
Route::get('editroledata/{id}', ['uses'=>'RoleController@edit', 'as'=>'role.edit'])->middleware('permission:edit.role');
Route::post('updaterole', ['uses'=>'RoleController@update', 'as'=>'role.update']);
Route::get('deleterole', ['uses'=>'RoleController@destroy', 'as'=>'role.destroy']);

//permission
Route::get('permission', ['uses'=>'PermissionController@index', 'as'=>'permission.index'])->middleware('permission:view.permission');
Route::get('permissiondata', ['uses'=>'PermissionController@anydata', 'as'=>'permission.anydata']);
Route::post('storepermission', ['uses'=>'PermissionController@store', 'as'=>'permission.store']);
Route::post('updatepermission',['uses'=>'PermissionController@update','as'=>'permission.update']);
Route::get('deletepermission', ['uses'=>'PermissionController@destroy', 'as'=>'permission.destroy']);

//calander
Route::get('events', 'EventController@index')->name("events1");
Route::get('localevents', 'EventController@localeventindex')->name("localeventindex1");
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

Route::resource('meetings', 'MeetingController');

Route::post('meetings/search', 'MeetingController@search')->name("meetings.search");


//task
Route::get('taskcontact/{id}', ['uses'=>'EventController@gototaskcontact', 'as'=>'task.gototaskcontact']);

//calander
Route::resource('gcalendar', 'gCalendarController');
Route::post('gcalendarup', 'gCalendarController@update1')->name('gcalendar.update1');
Route::post('gcalendarup/delete' , 'gCalendarController@delete')->name('gcalendar.delete');

Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'gCalendarController@oauth']);
// Route::get('oauth', ['as' => 'oauthCallback', 'uses' => 'gCalendarController@oauth']);
Route::get('oauth2callback', 'gCalendarController@zoho');
Route::get('inserteventzoho', 'gCalendarController@zoho1');

//notification message
Route::post('message', 'EventController@notificationmessage')->name('show.notificationmessage');
Route::post('shownomessage', 'EventController@readnotificationmessage')->name('read.readnotificationmessage');
Route::get('redmore',['uses'=>'NotificationController@morenotification','as'=>'show.morenotification']);
Route::get('notificationannydata',['uses'=>'NotificationController@anydata','as'=>'notification.anydata']);

//show profile
Route::get('showprofile',['uses'=>'UserController@showprofile','as'=>'user.showprofile']); 
Route::post('updateprofile',['uses'=>'UserController@updateprofile','as'=>'user.updateprofile']); 