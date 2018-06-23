@extends("dash")

@section("pagetitle", " Mes Actions")

@section('stylesheets')
    <!-- DataTables CSS -->
    <link href="/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@endsection

@section("content")
    <!-- Main Content -->

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
 <h3 class="box-title col-md-6">Actions</h3>
    <div class="col-md-6">
    <a class="btn btn-info pull-right" href="{{route('actions.create')}}"><span class="glyphicon glyphicon-plus"> </span> Ajouter une Action</a>

    </div>
  <hr>
 </div>
      <!-- /.box-header -->
      <div class="box-body col-xs-12">
        <table id="example1" class="table table-hover">
          <thead class="">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th class="">Description</th>
              <th class="">budget</th>
              <th class="">Localisation</th>
              <th class="">start</th>
              <th class="">end</th>
              <th class="">Created At</th>
              <th class="">Updated At</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($actions as $action)
              <tr class="">
                <td class="fit">{{ $action -> id }}</td>
                <td class="fit">
                    {{ substr($action -> title, 0, 20) }}
                    {{ strlen($action-> title) > 20 ? "..." : "" }}
                </td>
                <td class=" fit">
                    {{ substr($action -> description, 0, 20) }}
                    {{ strlen($action-> description) >20 ? "..." : "" }}
                </td>

                <td class=" fit">{{ $action -> budget}}</td>
                <td class=" fit">{{ $action -> localisation}}</td>

                <td class="">{{ date('d M Y', strtotime($action -> start)) }}</td>
                <td class="">{{ date('d M Y', strtotime($action -> end)) }}</td>
                                
                <td class="">{{ date('d M Y', strtotime($action -> created_at)) }}</td>
                <td class="">{{ date('d M Y', strtotime($action -> updated_at)) }}</td>
                <td>
                 <a href="{{route('actions.show', $action->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"> </span> View</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>

@endsection

@section("scripts")
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