@extends('dash')

@section("pagetitle", " Reset Password")

@section("stylesheets")

@endsection

@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading','???')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="password" class="col-sm-4 control-label">Password</label>

                            <div class="col-sm-6">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password_confirmation" class="col-sm-4 control-label">Password Confirmation</label>

                            <div class="col-sm-6">
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary btn-group pull-right">
                                    Reset Password
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
