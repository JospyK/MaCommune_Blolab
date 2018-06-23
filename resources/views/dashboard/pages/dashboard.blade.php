@extends("dash")

@section("pagetitle", " Dashboard")

@section('stylesheets')

@endsection


@section('content')

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                            <form class="form-horizontal" role="form" method="POST" action="">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="fname" class="col-md-3 control-label">First Name</label>

                            <div class="col-md-8">
                                <input id="fname" type="text" class="form-control" name="first_name" value="{{ old('fname') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="lname" class="col-md-3 control-label">Last Name</label>

                            <div class="col-md-8">
                                <input id="lname" type="text" class="form-control" name="last_name" value="{{ old('lname') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="classe" class="col-md-3 control-label">Classe</label>

                            <div class="col-md-8">
                                <input id="classe" type="text" class="form-control" name="classe" value="{{ old('classe') }}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">E-Mail Address</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-3 control-label">Password</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-3 control-label">Confirm Password</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="First Name" name="First Name" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Last Name" name="Last Name" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Commune" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

@endsection
