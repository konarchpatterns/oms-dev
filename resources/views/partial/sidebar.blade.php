<div class="sidebar" id="aaa"  data-color="purple" data-image="">
            
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo" id="logocahange"> 
                    <a href="#" class="simple-text">
                       <img src="{{asset('patternscrmdesign/assets/img/logo-dark.png')}}"> Patterns
                    </a>
                    
                </div>
                <ul class="nav">
                    <li class="nav-item ">
                        <a class="nav-link" href="#" title="">
                            <i class="fa fa-tachometer"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-toggle="collapse" href="#formsExamples" aria-expanded="false">
                              <i class="fa fa-bookmark"></i>
                            <p>
                                Orders <i class="fa fa-caret-down"></i>
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="formsExamples" style="">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.index') }}">
                                        <span class="sidebar-normal">Main Order Page</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-normal">Delay Orders  Vectors</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-normal">Delay Orders  Photoshop</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="#">
                                        <span class="sidebar-normal">Delay Orders  Digitizing</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                 
                    
                    <li>
                        <a class="nav-link" href="{{route('clients.index')}}">
                          <i class="fa fa-user"></i>
                            <p>Clients</p>
                        </a>
                    </li>
                   
            @permission('view.logs')
                    <li>
                        <a class="nav-link" href="{{route('avtivity.index')}}">
                          <i class="fa fa-list" aria-hidden="true"></i>
                            <p>Logs</p>
                        </a>
                    </li>
            @endpermission
           
                    <li>
                        <a class="nav-link" href="{{route('user.index')}}">
                            <i class="fa fa-id-card-o"></i>
                            <p>Users </p>
                        </a>
                    </li>
          
                    <li>
                        <a class="nav-link" href="{{route('role.index')}}">
                          <i class="fa fa-user-secret" aria-hidden="true"></i>
                            <p>Roles</p>
                        </a>
                    </li>
          
                    <li>
                        <a class="nav-link" href="{{route('permission.index')}}">
                            <i class="fa fa-lock"></i>
                            <p>Permission</p>
                        </a>
                    </li>
            
            @permission('view.email')
                    <li>
                        <a class="nav-link" href="{{route('mail.index')}}">
                            <i class="fa fa-envelope-o"></i>
                            <p>Emails</p>
                        </a>
                    </li>
            @endpermission
                    <li>
                        <a class="nav-link" href="#">
                            <i class="fa fa-calendar-o"></i>
                            <p>Calendar</p>
                        </a>
                    </li>
            
                    <li>
                        <a class="nav-link" href="{{route('user.index')}}">
                            <i class="fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                      
                  
                </ul>
            </div>
        </div>
