<?php
use App\Models\Setting;
//$setting = Setting::first();
?>
<header class="main-header">
    <a href="" class="logo d-flex justify-content-center">
       
    <img src="" class="img-circle elevation-2 img-fluid" alt=""> 
    </a>
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle p-1 px-3" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-1">
                <a class="p-1 btn" href="">
                    {{__('Profile')}}&nbsp;<i class="fa fa-user"></i>
                </a>
            </li>
            <li class="nav-item mr-1">
                <a class="p-1 btn" href="">
                    {{__('Change Password')}}&nbsp;<i class="fa fa-key"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="p-1 btn" href="javascript:void(0)" onclick="logout();">
                    {{__('Logout')}}&nbsp;<i class="fa fa-sign-out"></i>
                </a>
                <form id="logout-form" action="" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
      </div>
    </nav>
</header>
<script>
function logout(){
    swal({
        title: 'Are you sure?',
        text: "",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, logout!'
    }).then((isConfirm) => {
        if (isConfirm) {
          document.getElementById('logout-form').submit();
        }
    }).catch(swal.noop);
}
</script>
