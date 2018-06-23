@extends("dash")

@section("pagetitle", " Maires - Modifier")

@section('stylesheets')

@endsection


@section('content')

		<div class="row">
        	<div id="danger"></div>
            <div class="col-md-10 col-md-offset-1">
                <div class="login-panel panel panel-default" style="margin-top: 20px;">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ajouter le maire</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{route('maires.update', $maire->id)}}" id="login-form" enctype="multipart/form-data">
                            <fieldset>
        						<input type="hidden" name="_token" value="{{csrf_token()}}">
        						{{method_field("PUT")}}
        						
                                <div class="form-group">
                                    <label for="name" class="col-md-3 control-label">Nom</label>

                                    <div class="col-md-9">
                                        <input id="name" type="name" class="form-control" name="name" value="{{ $maire->name }}" placeholder="Nom" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="discours" class="col-md-3 control-label">Mot du Maire</label>

                                    <div class="col-md-9">
                                        <textarea id="discours" type="discours" class="form-control" name="discours" placeholder="Mot du Maire" rows="8" required>{{$maire->discours}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
									<label for="image" class="control-label col-md-3">Image</label>
                                    <div class="col-md-9">
                                        <input type="file" class="form-control col-md-9" id="image" name="image" data-validation-required-message="Please select the maire image.">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <button type="submit" class="btn btn-primary btn-group pull-right">Enregistrer</button>
                                        <a type="" class="btn btn-danger btn-group pull-left" href="{{route('maires.index')}}">Annuler</a>
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
