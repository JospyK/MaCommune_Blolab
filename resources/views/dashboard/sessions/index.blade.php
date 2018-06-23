@extends("dash")

@section("pagetitle", " Sessions")

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
 <h3 class="box-title col-md-6">Sessions</h3>
    <div class="col-md-6">
    <a class="btn btn-info pull-right" href="{{route('sessions.create')}}"><span class="glyphicon glyphicon-plus"> </span> Ajouter une session</a>

    </div>
  <hr>
 </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-hover">
          <thead class="">
            <tr>
              <th>#</th>
              <th>Title</th>
              <th class="hidden-xs">body</th>
              <th class="hidden-xs">Author</th>
              <th class="hidden-xs">Commune</th>
              <th class="hidden-xs">Created At</th>
              <th class="hidden-xs">Updated At</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($sessions as $session)
              <tr class="{{ $session->statut }}">
                <td class="fit">{{ $session -> id }}</td>
                <td class="fit">
                    {{ substr($session -> title, 0, 20) }}
                    {{ strlen($session-> title) > 20 ? "..." : "" }}
                </td>
                <td class="hidden-xs fit">
                    {{ substr($session -> body, 0, 20) }}
                    {{ strlen($session-> body) >20 ? "..." : "" }}
                </td>
                <td>{{ $session -> user -> first_name }}</td>

                <td class="hidden-xs fit">{{ $session -> commune -> name }}</td>

                <td class="hidden-xs">{{ date('d M Y', strtotime($session -> created_at)) }}</td>
                <td class="hidden-xs">{{ date('d M Y', strtotime($session -> updated_at)) }}</td>
                <td>
                 <a href="{{route('sessions.show', $session->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"> </span> View</a>
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