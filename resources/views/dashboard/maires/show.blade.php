@extends("dash")

@section("pagetitle", " Maires")

@section('stylesheets')

@endsection


@section('content')
 
            <div class="row">
                <div class="col-lg-12">
                    <!-- .panel-heading -->
                    <div class="body">
                        <div class="group" id="">
                            <div class="panel panel-default">
                            @if(!$maire)
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Aucun maire n'est enregistré pour cette commune<a href="{{route('maires.create')}}" class="btn btn-default pull-right"> Ajouter un maire <i class="glyphicon glyphicon-home"></i></a></a>
                                    </h4>
                                </div>
                            @else
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">DETAILS SUR LE MAIRE ACTUEL</a>
                                    </h4>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-xs-12 col-md-4">
                                        	<img src="{{'/images/maires_images/'.htmlspecialchars($maire->image)}}" class="img-responsive">
                                            <h2>{{$maire->name}}</h2>
                                            <div><strong>Commune : </strong>{{$maire->commune->name}}</div>
                                        </div>
                                        <div class="col-xs-12 col-md-8 text-center">
                                        	<h2>Mot du Maire</h2>
                                            <p>{{$maire->discours}}</p>
                                        </div>
                                        <div class="col-xs-12">
                                        	<a href="{{route('maires.index')}}" class="btn btn-primary pull-right"> Acceueil <i class="glyphicon glyphicon-home"></i></a>
                                            <a href="{{route('maires.edit', $maire->id)}}" class="btn btn-primary pull-right"> Modifier <i class="glyphicon glyphicon-pencil"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->


@endsection

@section('scripts')

@endsection
