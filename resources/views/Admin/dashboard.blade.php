@extends('layouts.admin')

@section('pagetitle')
{{__('Dashboard')}}
@endsection

@section('content')
<style type="text/css">
  
.skin-blue .wrapper, .skin-blue .main-sidebar, .skin-blue .left-side {
  background: white;
}

.sidebar {
  left: 0;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}


.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
}
 
.sidebar a.active {
  background-color: #4CAF50;
  color: white;
}

.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 1000px;
}



@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}

.box1 {
  width: 100%;
  border: 1px solid green;
  padding: 10px;
  margin: 2px;
}

</style>

<?php //echo "<pre>"; print_r($sales_data); exit;

//echo "<pre>",print_r($hours);die;
?>



<div class="sidebar">
  <a class="active" href="#home">Home</a>
  <a href="{{ route('monthlydashboard')}}">Monthly Dashboard</a>
  <a href="{{ route('user.index') }}">User Management</a>
  <a href="#about">Exit</a>
</div>

<div class="content-wrapper>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid px-0">
            <div class="row mb-2 mx-0 mt-3">
                <div class="col-md-12 col-sm-12">
                    <h1 class="m-0 text-dark d-inline">Dashboard</h1>
                    <ol class="breadcrumb float-right p-1">
                        <li class="breadcrumb-item"><a href="{{url('/')}}" class="btn btn-primary border-0">Home</a></li>
                    </ol>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <section>

        <div class="card-body box1">
            <form id="search-form" class="" role="form" >
                <div class="row">
                 <!--  <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                            <label class="d-block">{{__('Company')}}</label>
                            <select class="form-control" id="company_id" name='company_id' style="width: 100%;">
                                 <option value="">Select Company</option>
                                 @foreach($company_list as $company=>$value )
                                     <option value="{{ $company }}"> {{ $value }}</option>
                                 @endforeach
                            </select>


                        </div>
                  </div> -->
                  <!-- <div class="col-md-3 col-xs-12">
                     <label for="page_name">{{__('Client')}}</label>
                     <select class="cuisines-list  col-12 form-control" id="client_id" name="branch_id[]" style="width: 100%;" multiple >
                         <option value="">Select Branch</option>
                     </select>
                  </div> -->
                  <div class="col-md-3 col-xs-12">
                      <label for="page_name">{{__('From')}}</label>
                      <div class="input-group date border">
                          <div class="input-group-addon align-middle text-center rounded">
                            <i class="fa fa-calendar m-2"></i>
                          </div>
                          <input type="text" class="form-control float-right border-0 rounded" name="from_date" id="from_date" value="<?php if(isset($from_date) && $from_date!=''){ echo $from_date; }?>">
                      </div>
                  </div>
                  <div class="col-md-3 col-xs-12">
                       <label for="page_name">{{__('To')}}</label>
                       <div class="input-group date border">
                          <div class="input-group-addon align-middle text-center rounded">
                          <i class="fa fa-calendar m-2"></i>
                        </div>
                          <input type="text" class="form-control float-right border-0 rounded" name="to_date" id="to_date" value="<?php if(isset($req_data) && $to_date!='')
                          { echo $to_date;}?>">
                       </div>
                  </div>
                  <div class="col-md-12 col-xs-12 text-center">
                    <div class="btn-group mt-3">
                      <div class="form-group mr-3 mb-0">
                            <button type="submit" class="btn btn-info"><i class="fa fa-search mr-2"></i>Search</button>
                        </div>
                        <div class="form-group mb-0">
                            <button type="button" class="btn btn-warning" onclick="ResetDashboard()"><i class="fa fa-refresh mr-2"></i>Reset</button>
                        </div>
                    </div>
                  </div>
                </div>
            </form>
            <input type="hidden" name="hidden_branches" id="hidden_branches" value="<?php if(!empty($req_data['branch_id'])) { echo implode(',',$req_data['branch_id']);}?>" />
        </div>

    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Top order and salse -->
        <div class="row">
        <div class="col-md-3 col-xs-12 px-1">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-money"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Sales</span>
              <span class="info-box-number"><?php echo $sales_data[0]->SalesTotal ;?><small> USD</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-xs-12 px-1">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Orders</span>
              <span class="info-box-number"><?php echo $sales_data[0]->SalesOrder  ; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-xs-12 px-1">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Companies</span>
              <span class="info-box-number"><?php echo $sales_data[0]->TotalCustomer ; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- /.col -->
        <div class="col-md-3 col-xs-12 px-1">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Pending Orders</span>
              <span class="info-box-number"><?php //echo $sales_data[0]->TotalCustomer ; ?></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>

        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Total Sales</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Total Order Count</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Total Companies</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Pending Order</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

        <div class="row">
          <div class="col-lg-4 col-md-6 col-xs-12">
            <!-- jQuery Knob -->
            <div class="box box-info">
              <div class="box-header with-border d-flex">
                <div class="d-inline">
                  <i class="fa fa-bar-chart-o"></i>
                  <h4 class="box-title">Total Sales</h4>
                </div>
                <div class=" ml-auto">
                  <div class="text-right small">
                      <?php if(isset($req_data['from_date']) && $req_data['from_date']!="" && isset($req_data['to_date']) && $req_data['to_date']!=""){
                        $from_date=date('d-m-y H:i',strtotime($req_data['from_date']));
                        $to_date=date('d-m-y H:i',strtotime($req_data['to_date']));
                        echo '<i class="fa fa-calendar"></i>&nbsp;'.$from_date." To ".$to_date;
                      }else if(isset($req_data['from_date']) && $req_data['from_date']!=""){
                        $from_date=date('d-m-y H:i',strtotime($req_data['from_date']));
                        echo '<i class="fa fa-calendar"></i>&nbsp;'."From ".$from_date;
                      }else if(isset($req_data['to_date']) && $req_data['to_date']!=""){
                        $to_date=date('d-m-y H:i',strtotime($req_data['to_date']));
                        echo '<i class="fa fa-calendar"></i>&nbsp;'."To ".$to_date;
                      }?>
                  </div>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <?php

                  $deliveryamount_per=0;
                  $pickupamount_per= 0;
                  $externalamount_per=0;
                  // if(isset($sales_data[0]->SalesTotal) && $sales_data[0]->SalesTotal >0 ) {
                  // $deliveryamount_per=round((($sales_data[0]->DeliveryTotal*100)/$sales_data[0]->SalesTotal));
                  // $pickupamount_per= round((($sales_data[0]->PickTotal*100)/$sales_data[0]->SalesTotal));
                  // $externalamount_per=round((($sales_data[0]->ExternalTotal*100)/$sales_data[0]->SalesTotal));
                  // }
                  // ?>
                  <div class="row justify-content-around align-items-center mx-0">
                    <div class="col-xs-6 mr-4 mr-sm-0 text-center">
                      <input type="text" class="knob border-0 bg-transparent" data-width="80" data-height="80" data-fgColor="#3c8dbc" data-readOnly=true value="<?php echo $externalamount_per;?>">

                      <div class="knob-label">Completed</div>
                      <div class="knob-label"><?php echo number_format($sales_data[0]->Completed,3,'.','');?> <small> </small></div>
                    </div>

                    <div class="col-xs-6 mr-4 mr-sm-0 text-center">
                      <input type="text" class="knob border-0 bg-transparent" data-width="80" data-height="80" data-fgColor="#f56954" data-readOnly=true value="<?php echo $pickupamount_per;?>">

                      <div class="knob-label">Revision Completed</div>
                      <div class="knob-label"><?php echo number_format($sales_data[0]->RevCompleted,3,'.','');?> <small> </small></div>
                    </div>
                    <div class="col-xs-6 mr-4 mr-sm-0 text-center">
                      <input type="text" class="knob border-0 bg-transparent" data-width="80" data-height="80" data-fgColor="#00a65a" data-readOnly=true value="<?php echo $deliveryamount_per;?>">

                      <div class="knob-label">Ch-Completed</div>
                      <div class="knob-label"><?php echo number_format($sales_data[0]->ChCompleted,3,'.','');?> <small> </small></div>
                    </div>

                  </div>


              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="box box-info">
            <div class="box-header with-border d-flex">
              <div class="d-inline">
                <i class="fa fa-bar-chart-o"></i>
                <h4 class="box-title">Total Order</h4>
              </div>
              <div class=" ml-auto">
                <div class="text-right small">
                    <?php if(isset($req_data['from_date']) && $req_data['from_date']!="" && isset($req_data['to_date']) && $req_data['to_date']!=""){
                      $from_date=date('d-m-y H:i',strtotime($req_data['from_date']));
                      $to_date=date('d-m-y H:i',strtotime($req_data['to_date']));
                      echo '<i class="fa fa-calendar"></i>&nbsp;'.$from_date." To ".$to_date;
                    }else if(isset($req_data['from_date']) && $req_data['from_date']!=""){
                      $from_date=date('d-m-y H:i',strtotime($req_data['from_date']));
                      echo '<i class="fa fa-calendar"></i>&nbsp;'."From ".$from_date;
                    }else if(isset($req_data['to_date']) && $req_data['to_date']!=""){
                      $to_date=date('d-m-y H:i',strtotime($req_data['to_date']));
                      echo '<i class="fa fa-calendar"></i>&nbsp;'."To ".$to_date;
                    }?>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <?php

                $deliveryamount_per=0;
                $pickupamount_per= 0;
                $externalamount_per=0;
                // if(isset($sales_data[0]->SalesTotal) && $sales_data[0]->SalesTotal >0 ) {
                // $deliveryamount_per=round((($sales_data[0]->DeliveryTotal*100)/$sales_data[0]->SalesTotal));
                // $pickupamount_per= round((($sales_data[0]->PickTotal*100)/$sales_data[0]->SalesTotal));
                // $externalamount_per=round((($sales_data[0]->ExternalTotal*100)/$sales_data[0]->SalesTotal));
                // }
                // ?>
                <div class="row justify-content-around align-items-center mx-0">


                  <div class="col-xs-6 mr-4 mr-sm-0 text-center">
                    <input type="text" class="knob border-0 bg-transparent" data-width="80" data-height="80" data-fgColor="#3c8dbc" data-readOnly=true value="">

                    <div class="knob-label">Completed Orders</div>
                    <div class="knob-label"><?php echo $sales_data[0]->Completed;?></div>
                  </div>

                  <div class="col-xs-6 mr-4 mr-sm-0 text-center">
                    <input type="text" class="knob border-0 bg-transparent" data-width="80" data-height="80" data-fgColor="#f56954"  data-readOnly=true value="">

                    <div class="knob-label">Revised Orders</div>
                    <div class="knob-label"><?php echo $sales_data[0]->RevCompleted;?></div>
                  </div>
                  <div class="col-xs-6 mr-sm-0 text-center">
                    <input type="text" class="knob border-0 bg-transparent" data-width="80" data-height="80" data-fgColor="#00a65a" data-readOnly=true value="">

                    <div class="knob-label">Change Orders</div>
                    <div class="knob-label"><?php echo $sales_data[0]->ChCompleted;?></div>
                  </div>

                </div>
            </div>
          </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
            <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Top 5 Companies</h3>

                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
  <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                      <tr>
                        <th>Company</th>
                        <th>Sales</th>
                        <th>Order</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($topfivefranchises_data)){
                        foreach ($topfivefranchises_data as $topfivefranchises) {
                        ?>
                        <tr>
                            <td><?php echo $topfivefranchises->client_company?></td>
                            <td><?php echo number_format($topfivefranchises->total_amount,3,'.','')?></td>
                            <td><?php echo $topfivefranchises->total_order?></td>
                        </tr>
                      <?php }
                      }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
            </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- Top order and salse-->
        <!-- Statistics -->
        <div class="row">
          <div class="col-lg-8 col-md-6  col-xs-12">
            <div class="box box-success">
                <div class="box-header with-border d-flex">
                <div>
                  <i class="fa fa-bar-chart-o"></i>
                  <h3 class="box-title">Statistics</h3>
                </div>
                <div class=" ml-auto">
                  <div class=" small">
                     <?php if(isset($req_data['from_date']) && $req_data['from_date']!="" && isset($req_data['to_date']) && $req_data['to_date']!=""){
                          $from_date=date('d-m-y H:i',strtotime($req_data['from_date']));
                          $to_date=date('d-m-y H:i',strtotime($req_data['to_date']));
                          echo '<i class="fa fa-calendar"></i>&nbsp;'.$from_date." To ".$to_date;
                        }else if(isset($req_data['from_date']) && $req_data['from_date']!=""){
                          $from_date=date('d-m-y H:i',strtotime($req_data['from_date']));
                          echo '<i class="fa fa-calendar"></i>&nbsp;'."From ".$from_date;
                        }else if(isset($req_data['to_date']) && $req_data['to_date']!=""){
                          $to_date=date('d-m-y H:i',strtotime($req_data['to_date']));
                          echo '<i class="fa fa-calendar"></i>&nbsp;'."To ".$to_date;
                        }?>
                  </div>
                </div>
                </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="row">
                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                      <div class="inner">
                        <h3><?php if(isset($stat_data)){echo $stat_data[0]->SalesOrder ;}else{echo 0;}?></h3>
                        <p>Order</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-headphones"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                      <div class="inner">
                        <h3>0</h3>

                        <p>Mobile App</p>
                      </div>
                      <div class="icon">
                        <i class="fa fa-mobile-phone"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-primary text-white">
                      <div class="inner">
                        <h3>0</h3>

                        <p>Customer Portal</p>
                      </div>
                      <div class="icon">
                        <i class="fa  fa-television"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                      
                      <div class="icon">
                        <i class="fa fa-percent"></i>
                      </div>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-4 col-xs-6">
                    <!-- small box -->
                  
              </div>
                  <!-- ./col -->
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Top 5 Clients</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                     <tr class="">
                      <th>Client</th>
                      <th>Sales</th>
                      <th>Order</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $order=0;if(!empty($topfiveagent_data)){
                      foreach ($topfiveagent_data as $topfiveagent) {
                      ?>
                      <tr>
                          <td><?php echo $topfiveagent->name?></td>
                          <td><?php echo number_format($topfiveagent->total_amount,3,'.','')?></td>
                          <td><?php echo $topfiveagent->total_order;
                          $order=$order+$topfiveagent->total_order;
                          ?></td>
                      </tr>
                    <?php }
                    }?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
          </div>
        </div>

          <!-- /.col -->
        </div>
        <!-- /.row -->


        <div class="row">
          <div class="col-lg-8 col-md-6 col-xs-12">
            <div class="box box-solid box-warning">
            <div class="box-header with-border">
              <h3 class="box-title invisible"></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="card">

              <div class="card-body">
                   <div class="box-body">
                      <h5 class="card-title">  Price Chart </h5>
                      <h6 class="card-subtitle mb-2 text-muted"> {{ $from_date  }} to  {{ $to_date }}</h6>
                        <div id="pickhrs_chart"></div>
                    </div>
     
              </div>

            
           </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12">
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Top 5 Clients</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                     <tr class="">
                      <th>Client</th>
                      <th>Sales</th>
                      <th>Order</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $order=0;if(!empty($topfivecustomer_data)){
                      foreach ($topfivecustomer_data as $topfivecust) {
                      ?>
                      <tr>
                          <td><?php echo $topfivecust->name." ".$topfivecust->phone?></td>
                          <td><?php echo number_format($topfivecust->total_amount,3,'.','')?></td>
                          <td><?php echo $topfivecust->total_order;
                          $order=$order+$topfivecust->total_order;
                          ?></td>
                      </tr>
                    <?php }
                    }?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
          </div>
        </div>
        </div>
      </div><!-- /.container-fluid -->
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="box box-solid box-default">
            <div class="box-header with-border">
              <h3 class="box-title invisible"></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="order_chart"></div>
            </div>
          </div>
          </div>
          </div>
        </div>

    </section>
    <!-- /.content -->
    <!-- <section>

    </section> -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
@section('pagescript')
<script>
 $(document).ready(function (){
   $('#franchise_id').select2();
   $('#branch_id').select2();
   var franchise_id=$('#franchise_id').val();
   if(franchise_id!=''){
     getBranchByFranchise(franchise_id);
   }
   $('#franchise_id').on('change',function(){
         var franchise_id=$(this).val();
         getBranchByFranchise(franchise_id);
   });

   $('#from_date').datetimepicker({
     minView: 1,
     format: "dd-mm-yyyy hh:ii",
     autoclose: true,
     showTimepicker: true,
   });
   $('#to_date').datetimepicker({
     minView:1,
     format: "dd-mm-yyyy hh:ii",
     autoclose: true,
     showTimepicker: true,
   });
   /* jQueryKnob */

 $('.knob').knob({
   /*change : function (value) {
    //console.log("change : " + value);
    },
    release : function (value) {
    console.log("release : " + value);
    },
    cancel : function () {
    console.log("cancel : " + this.value);
    },*/
    parse: function (v) {return parseInt(v);},
    format: function (v) {return v + "%";},
    draw: function () {

     // "tron" case
     if (this.$.data('skin') == 'tron') {

       var a   = this.angle(this.cv)  // Angle
         ,
           sa  = this.startAngle          // Previous start angle
         ,
           sat = this.startAngle         // Start angle
         ,
           ea                            // Previous end angle
         ,
           eat = sat + a                 // End angle
         ,
           r   = true

       this.g.lineWidth = this.lineWidth

       this.o.cursor
       && (sat = eat - 0.3)
       && (eat = eat + 0.3)

       if (this.o.displayPrevious) {
         ea = this.startAngle + this.angle(this.value)
         this.o.cursor
         && (sa = ea - 0.3)
         && (ea = ea + 0.3)
         this.g.beginPath()
         this.g.strokeStyle = this.previousColor
         this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false)
         this.g.stroke()
       }

       this.g.beginPath()
       this.g.strokeStyle = r ? this.o.fgColor : this.fgColor
       this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false)
       this.g.stroke()

       this.g.lineWidth = 2
       this.g.beginPath()
       this.g.strokeStyle = this.o.fgColor
       this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false)
       this.g.stroke()

       return false
     }
   }
 })
 /* END JQUERY KNOB */
  pickhrs_chart()
  function pickhrs_chart(x = null ,y = null){
///new chart
 var json = {};
var options = {
chart: {
renderTo: 'container',
type: 'column',
marginRight: 130,
marginBottom: 25
},
title: {
text: 'Monthwise File Price',
x: -20 //center
},
subtitle: {
text: '',
x: -20
},
xAxis: {
categories: []
},
yAxis: {
title: {
text: 'File Price'
},
plotLines: [{
value: 0,
width: 1,
color: '#808080'
}]
},
tooltip: {
formatter: function() {
      return '&lt;b&gt;'+ this.series.name +'&lt;/b&gt;&lt;br/&gt;'+
          this.x +': '+ this.y;
}
},
legend: {
layout: 'vertical',
align: 'right',
verticalAlign: 'top',
x: -10,
y: 100,
borderWidth: 0
},
plotOptions: {
column: {
stacking: 'normal',
dataLabels: {
enabled: true,
color: (Highcharts.theme) || 'white'
}
}
},
series: [ ]
}

  
  
  //options.xAxis.categories = [ "name":"Month", "data":[201707,201708,201709] ] ;
  options.series[0] =  {"name":"Vector", "data": {!! $orders2 !!} } ;
  options.series[1] =  {"name":"Digitizing", "data": {!! $orders3 !!} } ;
  options.series[2] =  {"name":"Photoshop", "data": {!! $orders4 !!} } ;

  var xAxis = {
      categories: {!! $orders1 !!}
   };
 
  options.xAxis = xAxis ;
  json.options = options;


   //$(".jclick").click(function(event) {
       /* Act on the event */
    //   alert("clicked");
        $("#pickhrs_chart").highcharts(options);
        //$(".chartjvm1").highcharts(json1);

}


///new chart





  
      orderChart();
     function orderChart(x = null ,y = null)
    {   
        //var my_pr_analysis_chart = new Highcharts.Chart(options_my_pr_analysis);

        var options_my_pr_analysis =
      {
        chart:
         {
            renderTo: 'order_chart',
            type: 'column'
         },
        credits:
            {
                enabled: false
            },
        legend:
            {
                enabled: false
            },
        title:
            {
                text: 'Order count By Company'
            },
        xAxis:
            {
                categories: <?php echo $order_chart['chart_data']['x']; ?>,
                labels :
                   {
                      style :
                        {
                          fontSize :'15px'
                        }
                   }
            },
        yAxis:
           {
                min: 0,
                title:
                   {
                    text: 'Total Orders',
                    style :
                      {
                        fontSize :'18px'
                      }
                   },
                stackLabels:
                   {
                    enabled: true,
                    style:
                      {
                        fontWeight: 'bold',
                        fontSize :'15px',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                     }
                   },
                 labels :
                    {
                      style :
                        {
                          fontSize :'15px'
                        }
                    }
           },
        tooltip:
           {
                headerFormat: '<b><span style="font-size:15px">{point.x}</span></b><br/>',
                pointFormat: '<span style="font-size:15px">Total: {point.stackTotal}</span>'
            },
        plotOptions:
           {
                column:
                 {
                    stacking: 'normal',
                    ColorByPoint:true,
                    dataLabels:
                      {
                        enabled: false,
                      }
                 },
                 series: {
                point: {
                    events: {
                        click: function(){

                        }
                    }
                }
               }
            },

        series: [
                 {
                    data: [
                           <?php
                                echo $order_chart['chart_data']['y'];
                           ?>
                          ]
                  }
                ],
       };
       Highcharts.setOptions({
            lang: {
                thousandsSep: ''
            }
        });
       
       var my_pr_analysis_chart = new Highcharts.Chart(options_my_pr_analysis);
    }



    });
    function getBranchByFranchise(franchise_id){
      //  var url = "<?php //echo route('employee_manager.employeebranch_ajax_list')?>?franchise_ids="+franchise_id;
       var url = '';
        $.ajax({
             method: 'GET',
             url: url,
             beforeSend: function () {
             },
             success: function (response) {
                 $('#branch_id').html(response);
                 $('#branch_id').select2();
                 <?php if(!empty($req_data['branch_id'])){?>
                   select_branch()
                 <?php }?>
               },
              error: function(xhr, status, error) {
              }
         });
      }
      function select_branch(){
        var string=$('#hidden_branches').val();
        if(string!=""){
          var branchs=string.split(',');
          $("#branch_id").val(branchs).change();
          console.log('branchs ==>',branchs);
        }
      }
      function ResetDashboard(){
        location.href='<?php echo url('/home1')?>';
      }
</script>
@endsection
