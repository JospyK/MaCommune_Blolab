@extends("dash")

@section("pagetitle", " Mes Actualités")

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
 <h3 class="box-title col-md-6">Mes Actualité</h3>
    <div class="col-md-6">
    <a class="btn btn-info pull-right" href="{{route('actualites.create')}}"><span class="glyphicon glyphicon-plus"> </span> Ajouter une Actualité</a>

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
              <th class="hidden-xs">Description</th>
              <th class="hidden-xs">Author</th>
              <th class="hidden-xs">category</th>
              <th class="hidden-xs">Commune</th>
              <th class="hidden-xs">Created At</th>
              <th class="hidden-xs">Updated At</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody class="">
            @foreach($actualites as $actualite)
              <tr class="">
                <td class="fit">{{ $actualite -> id }}</td>
                <td class="fit">
                    {{ substr($actualite -> title, 0, 20) }}
                    {{ strlen($actualite-> title) > 20 ? "..." : "" }}
                </td>
                <td class="hidden-xs fit">
                    {{ substr($actualite -> description, 0, 20) }}
                    {{ strlen($actualite-> description) >20 ? "..." : "" }}
                </td>
                <td>{{ $actualite -> user -> first_name }}</td>

                <td class="hidden-xs fit">{{ $actualite -> category -> name}}</td>
                <td class="hidden-xs fit">{{ $actualite -> commune -> name }}</td>

                <td class="hidden-xs">{{ date('d M Y', strtotime($actualite -> created_at)) }}</td>
                <td class="hidden-xs">{{ date('d M Y', strtotime($actualite -> updated_at)) }}</td>
                <td>
                 <a href="{{route('actualites.show', $actualite->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"> </span> View</a>
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