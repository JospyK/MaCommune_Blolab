@extends("dash")

@section("pagetitle", " Forgot Password")

@section('stylesheets')

@endsection


@section('content')
        <div class="row">
            <div id="danger"></div>
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Forgot Password</h3>
                    </div>
                    <div class="panel-body">
                        <p class="text-center">Entrer votre addresse email pour restaurer votre mot de passe. <br> Vous recevrez un lien de recupération dans votre boite mail.</p>
                        <form class="form-horizontal" role="form" method="POST" action="" id="login-form">
                            <fieldset>
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">E-Mail</label>

                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-group pull-right">
                                            Login
                                        </button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('scripts')

@endsection
