
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="col-xs-12 col-md-6 breadcrumb pull-right" style="margin-top: 20px; margin-bottom: 0px;">
                          <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>

                          @for($i = 1; $i <= count(Request::segments()); $i++)
                            <li class="{{($i==count(Request::segments())-1) ? 'active' : ''}}">
                              <a href="@for($j =1; $j <= $i; $j++){{'/'.Request::segment($j)}}@endfor">{{Request::segment($i)}}</a>
                            </li>
                          @endfor
                        </ol>
                        <h1 class="col-xs-12 col-md-6 ">
                          @yield("pagetitle")
                          <small></small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->


                </div>
                <!-- /.row -->

                <hr  style="margin-top: 0px; margin-bottom: 20px;">
                    @include("dashboard.partials._messages")

                    @yield("content")
                
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->