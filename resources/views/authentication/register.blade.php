@extends("dash")

@section("pagetitle", " Register")

@section('stylesheets')

@endsection


@section('content')
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Register</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="">
                            <fieldset>
                                {{ csrf_field() }}

                                <div class="form-group">
                                    <label for="fname" class="col-md-3 control-label">Prenom</label>

                                    <div class="col-md-9">
                                        <input id="fname" type="text" class="form-control" name="first_name" value="{{ old('fname') }}" placeholder="Prenom" required autofocus>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="lname" class="col-md-3 control-label">Nom</label>

                                    <div class="col-md-9">
                                        <input id="lname" type="text" class="form-control" name="last_name" value="{{ old('lname') }}" placeholder="Nom" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-md-3 control-label">E-Mail</label>

                                    <div class="col-md-9">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="commune_id" class="col-md-3 control-label">Commune</label>
                                    <div class="col-md-9">
                                        <select class="form-control select2" name="commune_id" required data-validation-required-message="Please select a commune" data-placeholder="Please select a commune">
                                            <option value="" selected>Selectionner votre commune</option>
                                          @foreach($communes as $commune)
                                            <option value="{{$commune->id}}">{{$commune->name}}</option>
                                          @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-md-3 control-label">Mot de Passe</label>

                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Mot de Passe" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password-confirm" class="col-md-3 control-label">Confirmer Mot de Passe</label>

                                    <div class="col-md-9">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmer le mot de passe" required>
                                    </div>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-1">
                                        <button type="submit" class="btn btn-primary pull-right">
                                            Register
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
