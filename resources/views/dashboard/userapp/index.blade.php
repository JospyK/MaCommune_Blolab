@extends("dash")

@section("pagetitle", " All user")

@section('stylesheets')
  <link rel="stylesheet" type="text/css"  href="/css/parsley.css">
  <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
@endsection


@section("content")
	    <!-- Main Content -->

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example1" class="table table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Numero</th>
              <th>Commune</th>
              <th>Created At</th>
              <th>Updated At</th>
            </tr>
          </thead>
          <tbody>
            okk
            @foreach($users as $user)
              <tr class="">
                <td class="fit">{{ $user -> id }}</td>
                <td class="fit">
                    {{$user-> nom}}
                </td>
                <td class="fit">{{ $user->prenom }}</td>
                
                <td class="fit">{{ $user->numero}}</td>
                <td class="fit">{{ $user->commune->name}}</td>

                <td>{{ date('d M Y', strtotime($user -> created_at)) }}</td>
                <td>{{ date('d M Y', strtotime($user -> updated_at)) }}</td>
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