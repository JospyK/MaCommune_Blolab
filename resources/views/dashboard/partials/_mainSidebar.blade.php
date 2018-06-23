            <style type="text/css">.sidebar ul li a.active {background-color: transparent;}</style>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <form action="{{route('search')}}" method="post">
                            {{csrf_field()}}
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" name="search" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            <!-- /input-group -->
                            </form>
                        </li>

                        <li class="{{ Request::is('/dashboard') ? 'active' : ''}}">
                            <a href="{{route('dashboard')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>

                        <li class="">
                            <a href="{{route('maires.index')}}"><i class="fa fa-user fa-fw"></i> Mot du Maire</a>
                        </li>

                        <li class="">
                          <a href=""><i class="fa fa-dashboard fa-fw"></i> Action et Developpement</a>
                          <ul class="nav nav-second-level">
                            <li>
                              <a href="{{route('action_categories.index')}}">Categories</a>
                            </li>
                            <li>
                              <a href="{{route('actions.index')}}">Actions</a>
                            </li>
                          </ul>
                        </li>

                        <li class="{{ Request::is('/dashboard/sessions') ? 'active' : ''}}">
                            <a href="{{route('sessions.index')}}"><i class="fa fa-dashboard fa-fw"></i> Sessions Communales</a>
                        </li>


                        <li class="">
                            <a href=""><i class="fa fa-dashboard fa-fw"></i> Signalements</a>
                            <ul class="nav nav-second-level">
                              <li>
                                <a href="{{route('signalement_categories.index')}}">Categories</a>
                              </li>
                              <li>
                                <a href="{{route('signalements.index')}}">Signalements</a>
                              </li>
                            </ul>
                        </li>

                        <li class="{{ Request::is('/dashboard/infos') ? 'active' : ''}}">
                            <a href="{{route('infos.index')}}"><i class="fa fa-dashboard fa-fw"></i> Infos utiles</a>
                        </li>

                        <li class="{{ Request::is('/dashboard/userapp') ? 'active' : ''}}">
                            <a href="{{route('users.app')}}"><i class="fa fa-dashboard fa-user"></i> Users App</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->