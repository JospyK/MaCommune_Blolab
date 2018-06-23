@extends("dash")

@section("pagetitle", " Maires - Actuel")

@section('stylesheets')
    <!-- DataTables CSS -->
    <link href="/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@endsection


@section('content')

        
            <div class="row">
                <div class="col-lg-12">
                        <!-- .panel-heading -->
                        <div class="body">
                            <div class="group" id="">
                                <div class="panel panel-default">
                                    @if($maires->count() == 0)
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Aucun maire n'est enregistré pour cette commune<a href="{{route('maires.create')}}" class="btn btn-default pull-right"> Ajouter un maire <i class="glyphicon glyphicon-home"></i></a></a>
                                        </h4>
                                    </div>
                                    @else
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">DETAILS SUR LE MAIRE ACTUEL<a href="{{route('maires.create')}}" class="btn btn-default pull-right"> Ajouter un maire <i class="glyphicon glyphicon-home"></i></a></a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <div class="col-xs-12 col-md-4">
                                                <img src="{{'/images/maires_images/'.htmlspecialchars($maires->last()->image)}}" class="img-responsive">
                                                <h2>{{$maires->last()->name}}</h2>
                                                <div><strong>Commune : </strong>{{$maires->last()->commune->name}}</div>
                                            </div>
                                            <div class="col-xs-12 col-md-8 text-center">
                                                <h2>Mot du Maire</h2>
                                                <p>{{$maires->last()->discours}}</p>
                                            </div>
                                            <div class="col-xs-12">
                                                <a href="{{route('maires.index')}}" class="btn btn-primary pull-right"> Acceueil <i class="glyphicon glyphicon-home"></i></a>
                                                <a href="{{route('maires.edit', $maires->last()->id)}}" class="btn btn-primary pull-right"> Modifier <i class="glyphicon glyphicon-pencil"></i></a>
                                                <a href="{{route('maires.create')}}" class="btn btn-primary pull-left"> Changer <i class="glyphicon glyphicon-user"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Les anciens maires de la commune</a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse">
                                        <div class="panel-body">
                                            <div class="col-lg-12">
                                                <!-- /.panel-heading -->
                                                <div class="body">
                                                    <table width="100%" class="table table-striped table-bordered table-hover text-center" id="example1">
                                                        <thead>
                                                            <tr>
                                                                <th>Nom</th>
                                                                <th>Commune</th>
                                                                <th>Description</th>
                                                                <th>Option</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($maires as $maire)
                                                            <tr class="odd gradeX">
                                                                <td>{{$maire->name}}</td>
                                                                <td>{{$maire->commune->name}}</td>
                                                                <td>{{$maire->discours}}</td>
                                                                <td><a href="{{route('maires.show', $maire->id)}}" class="btn btn-primary">Option <i class="glyphicon glyphicon-eyes-open"></i></a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <!-- /.table-responsive -->
                                                </div>
                                                <!-- /.panel-body -->
                                            </div>
                                        <!-- /.col-lg-12 -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

@endsection

@section('scripts')
    <!-- DataTables JavaScript -->
    <script src="/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
    <script src="/vendor/datatables-responsive/dataTables.responsive.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#example1').DataTable({
            responsive: true
        });
    });
    </script>
@endsection
