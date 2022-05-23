 <?php
use App\Models\Setting;
$action = Route::getCurrentRoute()->getAction();
$controller = class_basename($action['controller']);
list($controller, $action) = explode('@', $controller);

//echo "<pre>"; print_r($setting->logo); exit;

$user_link = $user_deletedindex = $user_index = $user_create = $stockinout = $setting = $sync = $dashboard = $notification = $cms = $cuisine_link = $cuisine_create = $cuisine
= $thirdparty_link = $thirdparty_menu = $thirdparty_create = $thirdparty = $thirdparty_deletedindex
= $role_link = $role_menu = $role_create = $role = $role_deletedindex
= $tax_link = $tax_menu = $tax_create = $tax = $tax_deletedindex
= $menus = $menuitems = $menugroups = $menus_link
= $franchise_link = $franchise_create = $franchise
= $discount_link = $discount_create = $discount
= $city_link = $city_index = $city_deletedindex = $city_create
= $block_link = $block_index = $block_deletedindex = $block_create =  $backoffice_menu="";
$user_menu = "";
$claim_index = $support_index = "";

$printer_menu = $printer_link = "";$printer_index="";$printer_create="";
$branch_menu = $block_menu = $city_menu = $branch_link = "";$branch_import="";$branch_index="";$branch_create="";
$franchise_menu = $franchise_link = $order_link = $order = $order_menu = "";$search_link = $search = $search_menu = "";
$pendingorder_link = $pendingorder = $pendingorder_menu = "";
$employee_link = $employee_create = $employee = $menumodifiers = $menu_open = "";



if(($controller == 'MenuItemsController' || $controller == 'MenuGroupsController' ||$controller == 'MenuModifiersController') && $action == 'index'){
    $menus_link = "active"; $menu_open = "menu-open";
    $user_menu = "";
    if($controller == 'MenuItemsController' && $action == 'index'){
        $menuitems = "active";
    }
    if($controller == 'MenuGroupsController' && $action == 'index'){
        $menugroups = "active";
    }
    if($controller == 'MenuModifiersController' && $action == 'index'){
        $menumodifiers = "active";
    }
}
if($controller == 'CityController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $city_link = "active";$city_menu = "menu-open";
    if($action == 'index'){
        $city_index = "active";
    }
    if($action == 'deletedIndex'){
        $city_deletedindex = "active";
    }
    if($action == 'create'){
        $city_create = "active";
    }

}
if($controller == 'BlockController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'deletedIndex' || $action == 'show')){
    $block_link = "active";$block_menu = "menu-open";
    if($action == 'index'){
        $block_index = "active";
    }
    if($action == 'deletedIndex'){
        $block_deletedindex = "active";
    }
    if($action == 'create'){
        $block_create = "active";
    }

}
if($controller == 'PrinterController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'timings' || $action == 'dbconfig' || $action == 'blocks' || $action == 'importblocks')){
    $printer_link = "active";$printer_menu = "menu-open";
    if($action == 'index'){
      $printer_index = "active";
    }
    if($action == 'create'){
        $printer_create = "active";
    }
}
//echo $action;die;
if($controller == 'BranchController' && ($action == 'index' || $action == 'create' || $action == 'edit' || $action == 'timings' || $action == 'dbconfig' || $action == 'blocks' || $action == 'importblocks')){
    $branch_link = "active";$branch_menu = "menu-open";
    if($action == 'index'){
        $branch_index = "active";
    }
    if($action == 'create'){
        $branch_create = "active";
    }
    if($action == 'importblocks'){
        $branch_import= "active";
    }
}
if($controller == 'SettingController' && ($action == 'index')){
    $setting = "active";
}
if($controller == 'SyncController' && ($action == 'index')){
    $sync = "active";
}

if($controller == 'BranchController' && ($action == 'stockmanagement')){
    $stockinout = "active";
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
    $discount_link = "active";
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
if($controller == 'OrderController' && ($action == 'index')){
    $order_link = "active";$order_menu = "menu-open";
    if($action == 'index'){
        $order = "active";
    }
    if($action == 'deletedIndex'){
        $order_deletedindex = "active";
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
if($controller == 'SearchController' && ($action == 'index')){
    $search_link = "active";$search_menu = "menu-open";
    if($action == 'index'){
        $search = "active";
    }
    if($action == 'deletedIndex'){
        $search_deletedindex = "active";
    }
}
$setting = Setting::first();
//echo "<pre>"; print_r($setting->title); exit;
?>



<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mb-2 d-flex align-items-center">

            <!-- <div class="image">

                <img src="<?php echo asset('/../storage/app/settings/').'/'.$setting->logo; ?>" class="img-circle elevation-2" alt="User Image">
            </div> -->
            <div class="p-0">
                <a href="{{route('admindashboard')}}" class=" text-white d-block m-0 h5">{{substr($setting->title,0,50)}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <?php /*
                    <li class="nav-item  {{$franchise_menu}}">
                      <a href="javascript:void(0)" class="nav-link {{$franchise_link}} d-flex align-items-center">

                          <i class="nav-icon fa fa-building"></i>

                          <p>
                              <!-- {{__('Franchise Management')}} -->
                              <i class="right fa fa-angle-left"  style="top:24px;"></i>
                              <?php echo wordwrap('Franchise Management', 18  , "<br />\n"); ?>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('franchise.index')}}" class="nav-link {{$franchise}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('List')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('franchise.create')}}" class="nav-link {{$franchise_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Create')}}</p>
                              </a>
                          </li>
                      </ul>
                    </li>
                    <li class="nav-item {{$block_menu}}">
                        <a href="javascript:void(0)" class="nav-link {{$block_link}}">
                            <i class="nav-icon fa fa-map-pin"></i>
                            <p>
                                {{__('Block Management')}}
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('blocks.index')}}" class="nav-link {{$block_index}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{__('List')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('blocks.create')}}" class="nav-link {{$block_create}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{__('Create')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{$branch_menu}}">
                        <a href="javascript:void(0)" class="nav-link {{$branch_link}}">
                            <i class="nav-icon fa fa-map-pin"></i>
                            <p>
                                {{__('Branch Management')}}
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('branches.index')}}" class="nav-link {{$branch_index}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{__('List')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('branches.create')}}" class="nav-link {{$branch_create}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{__('Create')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('branchblock.import')}}" class="nav-link {{$branch_import}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{__('Import Blocks')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{$printer_menu}}">
                        <a href="javascript:void(0)" class="nav-link {{$printer_link}}">
                            <i class="nav-icon fa fa-print"></i>
                            <p>
                                {{__('Printer Management')}}
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('printers.index')}}" class="nav-link {{$printer_create}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{__('List')}}</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('printers.create')}}" class="nav-link {{$printer_create}}">
                                    <i class="fa fa-circle-o nav-icon"></i>
                                    <p>{{__('Create')}}</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item {{$menu_open}}">
                      <a href="javascript:void(0)" class="nav-link {{$menus_link}}">
                          <i class="nav-icon fa fa-ticket"></i>
                          <p>
                              {{__('Menu Management')}}
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('menuitems.index')}}" class="nav-link {{$menuitems}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Menu Items List')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('menugroups.index')}}" class="nav-link {{$menugroups}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Menu Groups List')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('menumodifiers.index')}}" class="nav-link {{$menumodifiers}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Menu Modifier List')}}</p>
                              </a>
                          </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                      <a href="javascript:void(0)" class="nav-link {{$cuisine_link}}">
                          <i class="nav-icon fa fa-cutlery"></i>
                          <p>
                              {{__('Cuisine Management')}}
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('cuisine.index')}}" class="nav-link {{$cuisine}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('List')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('cuisine.create')}}" class="nav-link {{$cuisine_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Create')}}</p>
                              </a>
                          </li>
                      </ul>
                    </li>
                    <li class="nav-item {{$role_menu}}">
                      <a href="javascript:void(0)" class="nav-link {{$role_link}}">
                          <i class="nav-icon fa fa-tasks"></i>
                          <p>
                              {{__('Role Management')}}
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('role.index')}}" class="nav-link {{$role}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('List')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('role.create')}}" class="nav-link {{$role_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Create')}}</p>
                              </a>
                          </li>
                      </ul>
                    </li>
                    <li class="nav-item {{$tax_menu}}">
                      <a href="javascript:void(0)" class="nav-link {{$tax_link}}">
                          <i class="nav-icon fa fa-percent"></i>
                          <p>
                              {{__('Tax Management')}}
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('tax.index')}}" class="nav-link {{$tax}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('List')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('tax.create')}}" class="nav-link {{$tax_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Create')}}</p>
                              </a>
                          </li>
                      </ul>
                    </li>
                    <li class="nav-item {{$thirdparty_menu}}">
                      <a href="javascript:void(0)" class="nav-link {{$thirdparty_link}} d-flex align-items-center">
                          <i class="nav-icon fa fa-external-link"></i>
                          <p>
                              <!-- {{__('3rd Party site Management')}} -->
                               <i class="right fa fa-angle-left"  style="top:24px;"></i>
                              <?php echo wordwrap('3rd Party site Management', 18  , "<br />\n"); ?>

                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('thirdparty.index')}}" class="nav-link {{$thirdparty}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('List')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('thirdparty.create')}}" class="nav-link {{$thirdparty_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Create')}}</p>
                              </a>
                          </li>
                      </ul>
                    </li>

                    <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link {{$franchise_link}} d-flex align-items-center">

                                    <i class="nav-icon fa fa-building" ></i>

                                    <p>
                                    <i class="right fa fa-angle-left" style="top: 24px;"></i>

                                        <?php echo wordwrap('Discount Management', 18  , "<br />\n"); ?>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('discount.index')}}" class="nav-link {{$discount}}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>{{__('List')}}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('discount.create')}}" class="nav-link {{$discount_create}}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>{{__('Create')}}</p>
                                        </a>
                                    </li>
                                </ul>
                              </li>

                   <li class="nav-item {{$thirdparty_menu}}">
                      <a href="javascript:void(0)" class="nav-link {{$thirdparty_link}}">
                          <i class="nav-icon fa fa-external-link"></i>
                          <p>
                              {{__('Synch Management')}}
                              <i class="right fa fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{route('synch.menugroups')}}" class="nav-link {{$thirdparty}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Menu Groups')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('synch.menuitems')}}" class="nav-link {{$thirdparty_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Menu Items')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('synch.menumodifiers')}}" class="nav-link {{$thirdparty_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Menu Modifiers')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('synch.menumodifierpopups')}}" class="nav-link {{$thirdparty_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Menu Modifier Popups')}}</p>
                              </a>
                          </li>

                          <li class="nav-item">
                              <a href="{{route('synch.menumodifiersbuildertemp')}}" class="nav-link {{$thirdparty_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Modifiers Builder Templates')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('synch.menumodifierbuilderdetail')}}" class="nav-link {{$thirdparty_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Modifier Builder Details')}}</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{route('synch.employees')}}" class="nav-link {{$thirdparty_create}}">
                                  <i class="fa fa-circle-o nav-icon"></i>
                                  <p>{{__('Employee')}}</p>
                              </a>
                          </li>
                      </ul>
                    </li>
                    <li class="nav-item">
                                <a href="javascript:void(0)" class="nav-link {{$order_link}}">

                                    <i class="nav-icon fa fa-th-list"></i>

                                    <p>
                                        {{__('Order Management')}}
                                        <i class="right fa fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('orders.index')}}" class="nav-link {{$order}}">
                                            <i class="fa fa-circle-o nav-icon"></i>
                                            <p>{{__('List')}}</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('pendingorders.index')}}" class="nav-link {{$pendingorder}} d-flex align-items-center ">

                                             <i class="fa fa-circle-o nav-icon" style="top: 24px;"></i>
                                            <?php echo wordwrap('Pending Order Management', 18  , "<br />\n"); ?>

                                        </a>
                                    </li>
                                   </ul>

                              </li>
                    <li class="nav-item">
                        <a href="{{route('settings.index')}}" class="nav-link {{$setting}}">
                            <i class="nav-icon fa fa-gear"></i>
                            <p>{{__('Setting')}}</p>
                        </a>
                    </li>
                </ul></nav>
              */ ?>
          <ul class="sidebar-menu tree" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{$dashboard}}">
              <a href="{{route('admindashboard')}}" class="">
                <i class="fa fa-dashboard"></i> <span>{{__('Dashboard')}}</span>
              </a>
            </li>
            <li class="treeview {{$employee_link}}">
              <a href="javascript:void(0)">
                <i class="fa fa-users"></i>
                <span>{{__('Employee Management')}}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                 <li class="nav-item {{$employee}}">
                    <a href="{{route('employee.index')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                    </a>
                  </li>
                  <li class="nav-item {{$employee_create}}">
                    <a href="{{route('employee.create')}}" class="">
                        <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                    </a>
                  </li>
              </ul>
            </li>
            <li class="treeview  {{$franchise_menu}} {{$franchise_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-building"></i>
                  <span>{{__('Franchise Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$franchise}}">
                      <a href="{{route('franchise.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$franchise_create}}">
                      <a href="{{route('franchise.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview  {{$city_menu}} {{$city_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-building-o"></i>
                  <span>{{__('City Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$city_index}}">
                      <a href="{{route('cities.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$city_create}}">
                      <a href="{{route('cities.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview  {{$block_menu}} {{$block_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-map-pin"></i>
                  <span>{{__('Block Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$block_index}}">
                      <a href="{{route('blocks.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$block_create}}">
                      <a href="{{route('blocks.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview  {{$branch_menu}} {{$branch_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-map-pin"></i>
                  <span>{{__('Branch Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$branch_index}}">
                      <a href="{{route('branches.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$branch_create}}">
                      <a href="{{route('branches.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                    <li class="nav-item {{$branch_import}}">
                      <a href="{{route('branchblock.import')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Import Blocks')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{$printer_menu}} {{$printer_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-print"></i>
                  <span>{{__('Printer Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$printer_create}}">
                      <a href="{{route('printers.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$printer_create}}">
                      <a href="{{route('printers.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{$stockinout}}">
              <a href="{{route('menuitems.stockmanagement')}}" class="">
                  <i class="nav-icon fa fa-adjust"></i><span>{{__('Item Stock Management')}}</span>
              </a>
            </li>
            <li class="treeview {{$menu_open}} {{$menus_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-ticket"></i>
                  <span>{{__('Menu Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$menuitems}}">
                      <a href="{{route('menuitems.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$menugroups}}">
                      <a href="{{route('menugroups.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Groups List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$menumodifiers}}">
                          <a href="{{route('menumodifiers.index')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Modifier List')}}
                          </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{$cuisine_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-cutlery"></i>
                  <span>{{__('Cuisine Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$cuisine}}">
                      <a href="{{route('cuisine.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$cuisine_create}}">
                      <a href="{{route('cuisine.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{$tax_menu}} {{$tax_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-percent"></i>
                  <span>{{__('Tax Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$tax}}">
                      <a href="{{route('tax.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$tax_create}}">
                      <a href="{{route('tax.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview  {{$thirdparty_menu}} {{$thirdparty_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-external-link"></i>
                  <span>{{__('3rd Party Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$thirdparty}}">
                      <a href="{{route('thirdparty.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$thirdparty_create}}">
                      <a href="{{route('thirdparty.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview  {{$franchise_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-building"></i>
                  <span>{{__('Discount Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$discount}}">
                      <a href="{{route('discount.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$discount_create}}">
                      <a href="{{route('discount.create')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Create')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{$sync}}">
              <a href="{{route('sync.index')}}" class="">
                  <i class="nav-icon fa fa-refresh"></i><span>{{__('Sync Management')}}</span>
              </a>
            </li>
            <?php /*?>
            <li class="treeview {{$thirdparty_menu}} {{$thirdparty_link}}">
                  <a href="javascript:void(0)" class=" {{$thirdparty_link}}">
                      <i class="nav-icon fa fa-external-link"></i>
                      <span>{{__('Synch Management')}}</span>
                      <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                      </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="nav-item {{$thirdparty}}">
                          <a href="{{route('synch.menugroups')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Groups')}}
                          </a>
                      </li>
                      <li class="nav-item {{$thirdparty_create}}">
                          <a href="{{route('synch.menuitems')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Items')}}
                          </a>
                      </li>
                      <li class="nav-item {{$thirdparty_create}}">
                          <a href="{{route('synch.menumodifiers')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Modifiers')}}
                          </a>
                      </li>
                      <li class="nav-item {{$thirdparty_create}}">
                          <a href="{{route('synch.menumodifierpopups')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Menu Modifier Popups')}}
                          </a>
                      </li>

                      <li class="nav-item {{$thirdparty_create}}">
                          <a href="{{route('synch.menumodifiersbuildertemp')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Modifiers Builder Templates')}}
                          </a>
                      </li>
                      <li class="nav-item {{$thirdparty_create}}">
                          <a href="{{route('synch.menumodifierbuilderdetail')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Modifier Builder Details')}}
                          </a>
                      </li>
                      <li class="nav-item {{$thirdparty_create}}">
                          <a href="{{route('synch.employees')}}" class="">
                              <i class="fa fa-circle-o nav-icon"></i>{{__('Employee')}}
                          </a>
                      </li>
                  </ul>
            </li>
            <?php */?>
            <li class="treeview {{$order_link}}">
                <a href="javascript:void(0)">
                  <i class="fa fa-th-list"></i>
                  <span>{{__('Order Management')}}</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                   <li class="nav-item {{$order}}">
                      <a href="{{route('orders.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('List')}}
                      </a>
                    </li>
                    <li class="nav-item {{$pendingorder}}">
                      <a href="{{route('pendingorders.index')}}" class="">
                          <i class="fa fa-circle-o nav-icon"></i>{{__('Pending Order Management')}}
                      </a>
                    </li>
                </ul>
            </li>
            <li class="treeview {{$search_link}}">
                <a href="javascript:void(0)">
                    <i class="fa fa fa-search"></i>
                    <span>Search Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="nav-item {{$search}}">
                        <a href="{{route('search.index')}}"
                            class="">
                            <i class="fa fa-circle-o nav-icon"></i>List
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="{{route('search.create')}}"
                            class="">
                            <i class="fa fa-circle-o nav-icon"></i>Create
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{$setting}}">
              <a href="{{route('settings.index')}}" class="">
                  <i class="nav-icon fa fa-gear"></i><span>{{__('Setting')}}</span>
              </a>
            </li>
          </ul>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
