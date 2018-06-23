            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">{{ env('APP_NAME')}}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->

                @if (!Sentinel::check())
                  <li><a href="/login">Login</a></li>
                @else
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> {{ Sentinel::getUser()->first_name }} {{ Sentinel::getUser()->last_name }} <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <form id="logout-form" action="{{route('logout')}}" method="POST">
                                {{ csrf_field() }}
                            </form>
                            <a href="#" onclick="document.getElementById('logout-form').submit();"><i class="fa fa-door fa-fw"></i>Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
                @endif
            </ul>
            <!-- /.navbar-top-links -->
