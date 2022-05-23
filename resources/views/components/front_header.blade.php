<?php
use App\Models\EmployeeFranchaise;
use App\Models\EmployeeBranches;
use Illuminate\Http\Request;

$user=Auth::user();
if($user->role_id==1 ||$user->role_id==7){
  $franchaise_list=EmployeeFranchaise::getAlllist();
}else{
  $franchaise_list=EmployeeFranchaise::getlist($user->id);
}

if(isset($franchaise_id) && $franchaise_id >0){
  if($user->role_id==1 ||$user->role_id==7){
    $branch_list=EmployeeBranches::getAlllist($franchaise_id);
  }else{
    $branch_list=EmployeeBranches::getlist(Auth::user()->id,$franchaise_id);
  }
}else{
$franchaise_id=0;
  if($user->role_id==1 ||$user->role_id==7){
    $branch_list=EmployeeBranches::getAlllist();
  }else{
    $branch_list=EmployeeBranches::getlist(Auth::user()->id);
  }
}

//echo "<pre>",print_r($branch_list),"</pre>";die;

$profile_pic=asset('css/images/profile-pic.png');
if(Auth::user()->avatar != '')
  $profile_pic=asset('../storage/app/employee').'/'.Auth::user()->avatar;

?>
<header class="header-section">
          <div class="d-flex justify-content-between align-middle text-white bg-primary align-items-center">
              <div class="logo d-flex align-items-center">
               <a href="<?php echo url('/')?>" class="navbar-brand mr-3 p-0"><img src="{{asset('css/images/new-logo.png')}}" class="img-fluid" /></a>
           </div>
           <div class="profile-block d-flex align-items-center justify-content-center">
               <div class="ipaddress text-white mr-3">
                  <img src="{{asset('css/images/internet.png')}}" class="img-fluid mr-2" />
                  <span id="client_ip">192.168.0.122</span>
               </div>
               <div class="time-block mr-3">
                  <img src="{{asset('css/images/clock.png')}}" class="img-fluid mr-2" />
                  <span id="date-time">01/01/2018 00:00:00 AM</span>
               </div>
               <div class="media d-flex align-items-center">
                 <div class="media-body">
                   <span class="mt-0 mb-1"><?php echo Auth::user()->first_name." ".Auth::user()->last_name;?></span>
                 </div>
                 <div class="dropdown ml-3">
                 <button class="btn bg-transparent dropdown-toggle p-0" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span><img class="img-fluid" src="{{$profile_pic}}" alt="<?php echo Auth::user()->first_name;?>" width="100"></span>
                 </button>
                 <div class="dropdown-menu dropdown-menu-right border-0 p-0 shadow">
                       <div class="d-flex flex-column">
                           <div>
                              <a class="dropdown-item text-secondary px-2" href="{{route('agent.updateprofile')}}"><img src="{{asset('css/images/setting.png')}}" class="img-fluid" /><span>Settings / Preferences</span></a>
                           </div>
                           <!--
                           <div>
                              <a class="dropdown-item text-secondary px-2" href="{{route('agent.updateaccesscode')}}"><img src="{{asset('css/images/setting.png')}}" class="img-fluid" /><span>Change Access Code</span></a>
                           </div>
                           -->
                           <div class="dropdown-divider m-0"></div>
                           <div><a class="dropdown-item text-secondary px-2" href="{{route('agent.logout')}}"><img src="{{asset('css/images/lock.png')}}" class="img-fluid" /><span>Logout</span></a></div>
                           <!--
                           <div class="dropdown-divider m-0"></div>
                           <div><a class="dropdown-item text-secondary px-2" href="#"><img src="{{asset('css/images/exit.png')}}" class="img-fluid" /><span>Exit</span></a></div>
                           -->
                       </div>
                 </div>
               </div>
               </div>
           </div>
          </div>
           <!--Branches start-->
            <div class="col-md-12 p-0 d-flex Branches flex-fill">
             <div class="filter bg-primary">
                   <div class="dropdown">
                     <button class="btn bg-white dropdown-toggle p-2 rounded-0" type="button" id="filter_dropdown" aria-haspopup="true" aria-expanded="false" >
                       <span><img src="{{asset('css/images/setting.png')}}" class="" /></span>
                     </button>
                     <div id ="filter_dropdown_box" class="dropdown-menu border-0 p-3 shadow bg-off-white">
                       <div class="all-franchise">
                           <select class="form-control all-franchise-menu">
                             <option value="">All Franchise</option>
                             <?php if(!empty($franchaise_list)) {
                               foreach($franchaise_list as $frkey=>$franchaise) { ?>
                                 <option value="{{$frkey}}" @if($franchaise_id == $frkey)selected="selected"@endif>{{$franchaise}}</option>
                               <?php }
                            }?>
                           </select>
                       </div>
                     </div>
                   </div>
                </div>
             <div id="branch_section_header" class="Branches-inner row flex-nowrap m-0 p-0 w-100 align-items-center bg-white">
               <?php
               //print_r($branch_list);die;
               foreach($branch_list as $branch){?>
                 <div class="branch col-md-2 d-flex flex-fill align-items-center justify-content-center">
                     <div>
                       @if($branch['is_connected'] == 0)
                         <img src="{{asset('css/images/red-sign.png')}}" class="mr-2" />
                       @else
                           <img src="{{asset('css/images/green-sign.png')}}" class="mr-2" />
                       @endif
                     </div>
                     <div>{{$branch['name']}}</div>
                 </div>
               <?php } ?>
             </div>
             </div>
             <!--Branches end-->
       </header>
       <script type="text/javascript">
         $(document).ready(function(){
           $('#filter_dropdown').click(function(){
               if($('#filter_dropdown_box').is(":hidden"))
                 $('#filter_dropdown_box').show();
               else
                 $('#filter_dropdown_box').hide()
           });
           $('.all-franchise-menu').change(function(){

               location.href="<?php echo route('home')."/"; ?>"+$(this).val();
           });
       })
       // Usage
       getUserIP(function(ip){
       		document.getElementById("client_ip").innerHTML =  ip;
       });
       window.onload = setInterval(clock,1000);

       function clock()
       {
           var d = new Date();
           var date = d.getDate();
           var month = d.getMonth();
           var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
           month=month+1;
           var year = d.getFullYear();
           var day = d.getDay();
           var hour =d.getHours();
           var min = d.getMinutes();
           var sec = d.getSeconds();
           var apm = (hour < 12) ? "AM" : "PM";
           hour = (hour > 12) ? hour - 12 : hour;
           hour = (hour == 0) ? 12 : hour;
           hour = (hour < 10 ? "0" : "") + hour;
           date = (date < 10 ? "0" : "") + date;
           month = (month < 10 ? "0" : "") + month;
           min = (min < 10 ? "0" : "") + min;
           sec = (sec < 10 ? "0" : "") + sec;
           //document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year;
           //01/01/2018 04:10:31 PM
           document.getElementById("date-time").innerHTML=date+"/"+month+"/"+year+" "+hour+":"+min+":"+sec+" "+apm;
       }
       setInterval(function () {
           var date = new Date();
           if ((date.getMinutes() % 1) == 0) {
               var url = "<?php echo route('agent.branch_offlineonline_ajax')?>";
               $.ajax({
                    method: 'GET',
                    url: url,
                    beforeSend: function () {
                    },
                    success: function (response) {
                      $('#branch_section_header').html(response);
                    },
                    error: function(xhr, status, error) {
                      alert('Oops! something went wrong...');
                    }
                  });
           }
       }, 60000);
       </script>
