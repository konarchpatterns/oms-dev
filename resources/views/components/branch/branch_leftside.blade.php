<?php
use App\Models\Setting;
$action = Route::getCurrentRoute()->getAction();
$controller = class_basename($action['controller']);
list($controller, $action) = explode('@', $controller);

$user_link = $user_deletedindex = $user_index = $user_create = $stockinout = $setting = $dashboard = $notification = $cms = $cuisine = "";
$user_menu = "menu-open";
$claim_index = $support_index = $menuitems = $modifiers=$branch_menu=$branch_link=$branch_index=$branch_create=$branch_import="";
$thirdparty_menu=$thirdparty_link=$synch_menugroup=$synch_menuitem=$synch_menumodi=$synch_menumodipop=$synch_emp="";
if($controller == 'UserController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $user_link = "active";
    if($action == 'index'){
        $user_index = "active";
    }
    if($action == 'deletedIndex'){
        $user_deletedindex = "active";
    }
    if($action == 'create'){
        $user_create = "active";
    }

}

if($controller == 'UserController' && ($action == 'profile')){
    $setting = "active";
}
if($controller == 'BranchController' && ($action == 'stockmanagement')){
    $stockinout = "active";
}
if($controller == 'MenuItemsController' && $action == 'index'){
        $menuitems = "active";
   }

 if($controller == 'MenuModifiersController' && $action == 'index'){
        $modifiers = "active";
  }
  if($controller == 'BranchController' && ($action == 'index'||$action == 'create'||$action == 'importblocks')){
      $branch_menu = "menu-open";
      $branch_link="active";
      if($action == 'index')
      {
        $branch_index="active";
      }
      if($action == 'create')
      {
        $branch_create="active";
      }
      if($action == 'importblocks')
      {
        $branch_import="active";
      }
  }
  if(($controller == 'MenuGroupsController' || $controller == 'MenuItemsController' || $controller == 'MenuModifiersController' || $controller == 'MenuModifierPopupsController' || $controller == 'EmployeeController') && ($action == 'synch')){
      $thirdparty_menu = "menu-open";
      $thirdparty_link="active";
      if($controller == 'MenuGroupsController')
      {
        $synch_menugroup="active";
      }
      if($controller == 'MenuItemsController')
      {
        $synch_menuitem="active";
      }
      if($controller == 'MenuModifiersController')
      {
        $synch_menumodi="active";
      }
      if($controller == 'MenuModifierPopupsController')
      {
        $synch_menumodipop="active";
      }
      if($controller == 'EmployeeController')
      {
        $synch_emp="active";
      }

  }
  $setting = Setting::first();
?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="user-panel mb-2 d-flex align-items-center">
    <div class="p-0">
        <a href="{{route('dashboard')}}" class="text-white d-block m-0 h5">{{$setting->title}}</a>
    </div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="{{$dashboard}}">
                <a href="{{route('dashboard')}}" class="">
                <i class="fa fa-dashboard"></i> <span>{{__('Dashboard')}}</span>
                </a>
            </li>
            <li class="nav-item {{$stockinout}}">
              <a href="{{route('branchmenuitems.stockmanagement')}}" class="">
                  <i class="nav-icon fa fa-adjust"></i><span>{{__('Item Stock Management')}}</span>
              </a>
            </li>
            <?php /*?>
                <li class="{{$menuitems}}">
                        <a href="{{route('branchmenuitems.index')}}" class="">
                            <i class="fa fa-circle-o"></i><span>{{__('Menu Items List')}}</span>
                        </a>
                </li>
                <li class="{{$modifiers}}">
                        <a href="{{route('branchmenumodifiers.index')}}" class="">
                            <i class="fa fa-ticket nav-icon"></i><span>{{__('Modifiers Management')}}</span>
                        </a>
                </li>
                <li class="treeview {{$branch_link}} {{$branch_menu}}">
                    <a href="javascript:void(0)">
                        <i class="fa fa-map-pin"></i>
                        <span>{{__('Branch Management')}}</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="nav-item {{$branch_index}}">
                            <a href="{{route('brbranches.index')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i><span>{{__('List')}}</span>
                            </a>
                        </li>
                        <li class="nav-item  {{$branch_create}}">
                            <a href="{{route('brbranches.create')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i><span>{{__('Create')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{$branch_import}}">
                            <a href="{{route('brbranchblock.import')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <span>{{__('Import Blocks')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{$thirdparty_menu}} {{$thirdparty_link}}">
                        <a href="javascript:void(0)">
                            <i class="fa fa-external-link"></i>
                            <span>{{__('Synch Management')}}</span>
                            <span class="pull-right-container">
                            <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                    <ul class="treeview-menu">
                        <li class="nav-item {{$synch_menugroup}}">
                            <a href="{{route('brsynch.menugroups')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <span>{{__('Menu Groups')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{$synch_menuitem}}">
                            <a href="{{route('brsynch.menuitems')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <span>{{__('Menu Items')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{$synch_menumodi}}">
                            <a href="{{route('brsynch.menumodifiers')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <span>{{__('Menu Modifiers')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{$synch_menumodipop}}">
                            <a href="{{route('brsynch.menumodifierpopups')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <span>{{__('Menu Modifier Popups')}}</span>
                            </a>
                        </li>
                        <li class="nav-item {{$synch_emp}}">
                            <a href="{{route('brsynch.employees')}}" class="">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <span>{{__('Employee')}}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            <!--  <li class="nav-item">
                <a href="{{route('branchuser.profile')}}" class="nav-link {{$support_index}}">
                    <i class="nav-icon fa fa-life-ring"></i>
                    <p>{{__('Profile')}}</p>
                </a>
            </li> -->
            <?php */?>
        </ul>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
