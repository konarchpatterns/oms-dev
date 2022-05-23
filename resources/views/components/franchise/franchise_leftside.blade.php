<?php
use App\Models\Setting;
$action = Route::getCurrentRoute()->getAction();
$controller = class_basename($action['controller']);
list($controller, $action) = explode('@', $controller);

$user_link = $user_deletedindex = $user_index = $user_create = $setting = $dashboard = $notification = $cms = $cuisine = "";
$user_menu = "menu-open";
$claim_index = $support_index = $menuitems = $modifiers="";
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
if($controller == 'MenuItemsController' && $action == 'index'){
        $menuitems = "active";
   }

 if($controller == 'MenuModifiersController' && $action == 'index'){
        $modifiers = "active";
  }  
  $setting = Setting::first(); 
?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     
    <div class="user-panel mb-2 d-flex align-items-center">
    <div class="p-0">
    @if(Auth::user()->role_id == 4)
                <a href="{{route('franchisedashboard')}}" class="text-white d-block m-0 h5">
                @endif
                    @if(Auth::user()->role_id == 2)
                    <a href="{{route('executivedashboard')}}" class="text-white d-block m-0 h5">
                    @endif
                    {{$setting->title}}</a>
    </div>
    </div>
    <!-- Sidebar -->
    <div class="sidebar">
    <ul class="sidebar-menu tree" data-widget="tree">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item {{$dashboard}}">
            @if(Auth::user()->role_id == 4)
            <a href="{{route('franchisedashboard')}}" class="">
            @endif
                @if(Auth::user()->role_id == 2)
                <a href="{{route('executivedashboard')}}" class="">
                @endif
                <i class="nav-icon fa fa-dashboard"></i>
                <span>{{__('Dashboard')}}</span>
            </a>
        </li>
        <!--  <li class="nav-item">
            <a href="{{route('branchuser.profile')}}" class="nav-link {{$support_index}}">
                <i class="nav-icon fa fa-life-ring"></i>
                <p>{{__('Profile')}}</p>
            </a>
        </li> -->

        </ul>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
