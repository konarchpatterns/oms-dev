<?php
use App\Models\Setting;
$action = Route::getCurrentRoute()->getAction();
$controller = class_basename($action['controller']);
list($controller, $action) = explode('@', $controller);

$user_link = $user_deletedindex = $user_index = $user_create = $setting = $dashboard = $notification = $cms = $cuisine = "";
$user_menu = "menu-open";
$claim_index = $support_index = "";
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

if($controller == 'SettingController' && ($action == 'index')){
    $setting = "active";
}

if($controller == 'HomeController' && ($action == 'index')){
    $dashboard = "active";
}

if($controller == 'SettingController' && ($action == 'sendNotification')){
    $notification = "active";
}

if($controller == 'CmsController' && ($action == 'index' || $action == 'edit')){
    $cms = "active";
}

if($controller == 'UserController' && ($action == 'userClaims')){
    $claim_index = "active";
}

if($controller == 'UserController' && ($action == 'userSupport')){
    $support_index = "active";
}
$setting = Setting::first();
?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
         <img src='<?php echo asset('/../storage/app/settings/').'/'.$setting->logo; ?>' height="100px" class="brand-image img-circle elevation-3"/>
        <span class="brand-text font-weight-light">{{$setting->title}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        -->
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('dashboard')}}" class="nav-link {{$dashboard}}">
                        <i class="nav-icon fa fa-dashboard"></i>
                        <p>{{__('Dashboard')}}</p>
                    </a>
                </li>
                <li class="nav-item {{$user_menu}}">
                    <a href="javascript:void(0)" class="nav-link {{$user_link}}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            {{__('User Management')}}
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('users.index')}}" class="nav-link {{$user_index}}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{__('List')}}</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('users.create')}}" class="nav-link {{$user_create}}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{__('Create')}}</p>
                            </a>
                        </li>
                        <?php /*
                        <li class="nav-item">
                            <a href="{{route('deleted_users')}}" class="nav-link {{$user_deletedindex}}">
                                <i class="fa fa-circle-o nav-icon"></i>
                                <p>{{__('Deleted Users')}}</p>
                            </a>
                        </li>
                        */?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.claim')}}" class="nav-link {{$claim_index}}">
                        <i class="nav-icon fa fa-money"></i>
                        <p>{{__('User Claims')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('user.support')}}" class="nav-link {{$support_index}}">
                        <i class="nav-icon fa fa-life-ring"></i>
                        <p>{{__('User Support')}}</p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="{{route('settings.index')}}" class="nav-link {{$setting}}">
                        <i class="nav-icon fa fa-gear"></i>
                        <p>{{__('Setting')}}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('sendnotification')}}" class="nav-link {{$notification}}">
                        <i class="nav-icon fa fa-bell"></i>
                        <p>{{__('Send Notification')}}</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('cms.index')}}" class="nav-link {{$cms}}">
                        <i class="nav-icon fa fa-code"></i>
                        <p>{{__('CMS Management')}}</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('cuisine.index')}}" class="nav-link {{$cuisine}}">
                        <i class="nav-icon fa fa-code"></i>
                        <p>{{__('Cuisine Management')}}</p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
