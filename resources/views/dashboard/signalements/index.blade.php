@extends("dash")

@section("pagetitle", " Mes signalementss")

@section('stylesheets')
  <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
@endsection


@section("content")
    <!-- Main Content -->

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
 <h3 class="box-title col-md-6">Mes signalements</h3>
    <div class="col-md-6">
    <a class="btn btn-info pull-right" href="{{route('signalements.create')}}"><span class="glyphicon glyphicon-plus"> </span> Ajouter un signalement</a>

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
            @foreach($signalements as $signalement)
              <tr class="{{ $signalement->statut }}">
                <td class="fit">{{ $signalement -> id }}</td>
                <td class="fit">
                    {{ substr($signalement -> title, 0, 20) }}
                    {{ strlen($signalement-> title) > 20 ? "..." : "" }}
                </td>
                <td class="hidden-xs fit">
                    {{ substr($signalement -> description, 0, 20) }}
                    {{ strlen($signalement-> description) >20 ? "..." : "" }}
                </td>
                <td>{{ $signalement -> user -> first_name }}</td>

                <td class="hidden-xs fit">{{ $signalement -> category -> name}}</td>
                <td class="hidden-xs fit">{{ $signalement -> commune -> name }}</td>

                <td class="hidden-xs">{{ date('d M Y', strtotime($signalement -> created_at)) }}</td>
                <td class="hidden-xs">{{ date('d M Y', strtotime($signalement -> updated_at)) }}</td>
                <td>
                 <a href="{{route('signalements.show', $signalement->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"> </span> View</a>
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