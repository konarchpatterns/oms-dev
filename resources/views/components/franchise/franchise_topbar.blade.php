<?php
use App\Models\Setting;
$setting = Setting::first();
?>
<header class="main-header">
    <a href="{{route('admindashboard')}}" class="logo d-flex justify-content-center">
      <img src="<?php echo asset('/../storage/app/settings/').'/'.$setting->logo; ?>" class="img-circle elevation-2 img-fluid" alt="">
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
            @if(Auth::user()->role_id == 4)
                <a class="p-1 nav-link" href="{{route('franchiseuser.profile')}}">
            @endif   
            @if(Auth::user()->role_id == 2)
                <a class="p-1 nav-link" href="{{route('executiveuser.profile')}}">
            @endif
                    {{__('Profile')}}&nbsp;<i class="fa fa-user"></i>
                </a>
            </li>
            <li class="nav-item mr-1">
                <a class="p-1 nav-link" href="{{route('get.password')}}">
                    {{__('Change Password')}}&nbsp;<i class="fa fa-key"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="p-1 nav-link" href="javascript:void(0)" onclick="logout();">
                    {{__('Logout')}}&nbsp;<i class="fa fa-sign-out"></i>
                </a>
                <form id="logout-form" action="{{ route('franchise_auth.logout') }}" method="POST" style="display: none;">
                <input type="hidden" name="role_id" value="{{Auth::user()->role_id}}">
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