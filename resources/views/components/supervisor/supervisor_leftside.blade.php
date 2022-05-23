<?php
use App\Models\Setting;
$action = Route::getCurrentRoute()->getAction();
$controller = class_basename($action['controller']);
list($controller, $action) = explode('@', $controller);

//echo "<pre>"; print_r($controller); exit;

$user_link = $user_deletedindex = $user_index = $user_create = $setting = $dashboard = $notification = $cms = $cuisine_link = $cuisine_create = $cuisine
= $thirdparty_link = $thirdparty_menu = $thirdparty_create = $thirdparty = $thirdparty_deletedindex
= $role_link = $role_menu = $role_create = $role = $role_deletedindex
= $tax_link = $tax_menu = $tax_create = $tax = $tax_deletedindex
= $menus = $menuitems = $menugroups = $menus_link = $menumodifiers
= $franchise_link = $franchise_create = $franchise 
= $discount_link = $discount_create = $discount
= $block_link = $block_index = $block_deletedindex = $block_create =  $backoffice_menu="";
$user_menu = "";
$claim_index = $support_index = "";

$branch_menu = $block_menu = $branch_link = "";$branch_import="";$branch_index="";$branch_create="";
$franchise_menu = $franchise_link = $order_link = $order = $order_menu = $discount_menu="";
$pendingorder_link = $pendingorder = $pendingorder_menu = "";
$employee_link = $employee_create = $employee = "";



if(($controller == 'MenuItemsController' || $controller == 'MenuGroupsController' || $controller == 'MenuModifiersController') && ($action == 'index' || $action == 'edit')){
    $menus_link = "active"; $menus="menu-open";
    $user_menu = "";
    if($controller == 'MenuItemsController' && ($action == 'index' || $action == 'edit')){
        $menuitems = "active";
    }
    if($controller == 'MenuGroupsController' && ($action == 'index' || $action == 'edit')){
        $menugroups = "active";
    }
    if($controller == 'MenuModifiersController' && ($action == 'index' || $action == 'edit')){
        $menumodifiers = "active";
    }
}

//echo $action;die;

if($controller == 'SettingController' && ($action == 'index')){
    $setting = "active";
}

if($controller == 'HomeController' && ($action == 'index')){
    $dashboard = "active";
}



if($controller == 'CuisineController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $cuisine_link = "active";
    if($action == 'index'){
        $cuisine = "active";
    }
    if($action == 'deletedIndex'){
        $cuisine_deletedindex = "active";
    }
    if($action == 'create'){
        $cuisine_create = "active";
    }
}
if($controller == 'RoleController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $role_link = "active";
    $role_menu = "";
    if($action == 'index'){
        $role = "active";
    }
    if($action == 'deletedIndex'){
        $role_deletedindex = "active";
    }
    if($action == 'create'){
        $role_create = "active";
    }
}


if($controller == 'TaxController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $tax_link = "active";
    $tax_menu = "";
    if($action == 'index'){
        $tax = "active";
    }
    if($action == 'deletedIndex'){
        $tax_deletedindex = "active";
    }
    if($action == 'create'){
        $tax_create = "active";
    }
}


if($controller == 'ThirdPartyController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $thirdparty_link = "active";
    $thirdparty_menu = "";
    if($action == 'index'){
        $thirdparty = "active";
    }
    if($action == 'deletedIndex'){
        $thirdparty_deletedindex = "active";
    }
    if($action == 'create'){
        $thirdparty_create = "active";
    }
}
if($controller == 'FranchiseController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $franchise_link = "active";$franchise_menu = "menu-open";
    if($action == 'index'){
        $franchise = "active";
    }
    if($action == 'deletedIndex'){
        $franchise_deletedindex = "active";
    }
    if($action == 'create'){
        $franchise_create = "active";
    }

}
if($controller == 'EmployeeController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $employee_link = "active";
    if($action == 'index'){
        $employee = "active";
    }
    if($action == 'deletedIndex'){
        $employee_deletedindex = "active";
    }
    if($action == 'create'){
        $employee_create = "active";
    }

}

if($controller == 'UserController' && ($action == 'userClaims')){
    $claim_index = "active";
}

if($controller == 'UserController' && ($action == 'userSupport')){
    $support_index = "active";
}

if($controller == 'DiscountController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
   // $discount_link = "active";
    $discount_link = "active";$discount_menu = "menu-open";
    if($action == 'index'){
        $discount = "active";
    }
    if($action == 'deletedIndex'){
        $discount_deletedindex = "active";
    }
    if($action == 'create'){
        $discount_create = "active";
    }

}
// if($controller == 'OrderController' && ($action == 'index')){
//     $order_link = "active";$order_menu = "menu-open";
//     if($action == 'index'){
//         $order = "active";
//     }
//     if($action == 'deletedIndex'){
//         $order_deletedindex = "active";
//     }
// }
if($controller == 'OrderController' && ($action == 'index')){
    $order_link = "active";$order_menu = "menu-open";

    if($action == 'index'){
        $order = "active";
    }
 }
if($controller == 'PendingorderController' && ($action == 'index')){
    $pendingorder_link = "active";$pendingorder_menu = "menu-open";
    if($action == 'index'){
        $pendingorder = "active";
    }
    if($action == 'deletedIndex'){
        $pendingorder_deletedindex = "active";
    }
}
//echo "order_link="; print_R($order_menu); exit;
$setting = Setting::first();
?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="user-panel mb-2 d-flex align-items-center">
        <div class="p-0">
            <a href="{{route('supervisororder')}}" class="text-white d-block m-0 h5">{{$setting->title}}</a>
        </div>
    </div>
    <div class="sidebar">
        <ul class="sidebar-menu tree" data-widget="tree">
            <li class="treeview {{$order_menu}}{{$pendingorder_menu}} {{$order_link}}{{$pendingorder_link}}">
              <a href="javascript:void(0)" class="">
                <i class="fa fa-th-list"></i>
                <span>{{__('Order Management')}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class="nav-item {{$order_link}}">
                    <a href="{{route('supervisororders.index')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                    </a>
                  </li>
                  <li class="nav-item {{$pendingorder_link}}">
                    <a href="{{route('supervisorpendingorders.index')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('Pending Order Management')}}
                    </a>
                  </li>
              </ul>
            </li>
            <li class="treeview {{$menus_link}}">
              <a href="javascript:void(0)" class="">
                <i class="fa fa-ticket"></i>
                <span>{{__('Menu Management')}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class="nav-item {{$menuitems}}">
                    <a href="{{route('supervisormenuitems.index')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Items List')}}
                    </a>
                  </li>
                  <li class="nav-item {{$menugroups}}">
                    <a href="{{route('supervisormenugroups.index')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Groups List')}}
                    </a>
                  </li>
                  <li class="nav-item {{$menumodifiers}}">
                    <a href="{{route('supervisormenumodifiers.index')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Modifier List')}}
                    </a>
                  </li>
              </ul>
            </li>
            <li class="treeview {{$discount_link}}">
              <a href="javascript:void(0)" class="">
                <i class="fa fa-building"></i>
                <span>{{__('Discount Management')}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class="nav-item {{$discount}}">
                    <a href="{{route('supervisordiscount.index')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                    </a>
                  </li>
                  <li class="nav-item {{$discount_create}}">
                    <a href="{{route('supervisordiscount.create')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                    </a>
                  </li>
              </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
