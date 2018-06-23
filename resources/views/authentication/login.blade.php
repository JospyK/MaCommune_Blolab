@extends("start")

@section("pagetitle", " Register")

@section('stylesheets')

@endsection


@section('content')
        <div class="row">
            <div id="danger"></div>
            <div class="col-md-6 col-md-offset-3">
                <div class="login-panel panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
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
                                    <label for="password" class="col-md-3 control-label">Mot de Passe</label>

                                    <div class="col-md-9">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="Mot de Passe" required>
                                    </div>
                                </div>

                                <div class="">
                                    <div class="col-sm-6 col-sm-offset-1">
                                        <input id="password" type="checkbox" name="remenber_me">
                                        Remenber me
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-6 col-sm-offset-1">
                                        <a href="/forgot-password">Forgot your password???</a>
                                    </div>
                                    <div class="col-sm-4">
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

    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })

        $("#login-form").submit( function (event){
            event.preventDefault();
            
            var postData = {
                'email' : $('input[name=email]').val(),
                'password' : $('input[name=password]').val(),
                'remenber_me' : $('input[name=remenber_me]').is(':checked'),
            }

            $.ajax({
                type: 'POST',
                url: '/login',
                data: postData,
                
                success: function(response){
                    window.location.href = response.redirect
                },

                error: function(response){
                    $('#danger').text("")
                    $('#danger').append('<div class="container-fluid"><div class="row"><div class="col-sm-10 col-sm-offset-1 alert alert-danger text-center" role="alert" data-dismmiss="alert"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times</button><strong></strong></div></div></div>')
                    $('.alert-danger').text(response.responseJSON.error)
                }
            })            
        });
    </script>
@endsection
