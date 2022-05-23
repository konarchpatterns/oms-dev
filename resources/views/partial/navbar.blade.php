<nav class="navbar navbar-expand-lg"  color-on-scroll="500">
  <!-- removed above color style="background-color: #565759" -->
  <a href="#"  class="nav-link" id="changesidebar"><i class="fa fa-chevron-left" style="font-size:20px;color:#9370DB"></i></a>
                   <a href="#"  class="nav-link cc" id="largesidebar"><i class="fa fa-chevron-right" style="font-size:20px;color:#9370DB"></i></a>
                <div class="container-fluid">
                   
                    <!-- <a class="navbar-brand" href="#pablo"> Dashboard </a> -->
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
				    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                       @auth
                     <!-- <ul class="nav navbar-nav mr-auto">
                            
                          
                                <li class="nav-item">
                                <a href="#" class="nav-link" style="color: white">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>

                        </ul> -->

                        @endauth
						<ul class="nav navbar-nav mr-auto">
						  <li class="nav-item" id="menu1"></li>
						</ul>
						<div id="#title1" style="text-align:center;"></div>
                        <ul class="navbar-nav ml-auto">
                                          
                              <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                 
                                    <i class="fa fa-bell"  ></i>
                               @if(Auth::user()->unreadNotifications->count() != 0)
                                    <span class="notification removenotification" id="notificationvalue"></span> 
                                @endif          
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu" style="width:250px;background-color: #9A9B97;padding-top: 04px;padding-bottom: 04px;">
                                 
                                </ul>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('login'))
              
                                @auth
                                  <li class="nav-item">
                                <a href="{{route('user.showprofile')}}" class="nav-link"><b> {{Auth::user()->name}}</b></a>
                                 </li> 
                              
                                 <li class="nav-item">
                                                    <a  class="nav-link" href="{{ route('logout') }}"
                                       id="logoutsession">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf

                                    </form>
                                </li>
                                @else
                                 <li class="nav-item">
                                      <a class="nav-link" href="{{ route('login') }}" >Login</a>
                                  </li>
                                @if (Route::has('register'))
                                 <li class="nav-item">
                                     <a class="nav-link" href="{{ route('register') }}" style="color: white">Register</a>
                                 </li>
                               @endif
                              @endauth
                   
                              @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>