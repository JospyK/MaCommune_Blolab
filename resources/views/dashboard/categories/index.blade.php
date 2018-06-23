@extends("dash")

@section("pagetitle", " Types Actualités")

@section('stylesheets')
    <!-- DataTables CSS -->
    <link href="/vendor/datatables-plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="/vendor/datatables-responsive/dataTables.responsive.css" rel="stylesheet">
@endsection


@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading','A Clean Bootstrap Blog')

@section('content')

  <!-- Main Content -->

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
      <h3 class="box-title col-md-6">Types Actualités</h3>
	  	<div class="col-md-6">
      @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
	  	  <button class="btn btn-info pull-right"  data-toggle="modal" data-target="#addcategory"><span class="glyphicon glyphicon-plus"> </span> Add category</button>
  			<!-- Modal -->
  			<div id="addcategory" class="modal fade" role="dialog">
  			  <div class="modal-dialog">

  			    <!-- Modal content-->
  			    <div class="modal-content">

  			      <div class="modal-header">
  			        <button type="button" class="close" data-dismiss="modal">&times;</button>
  			        <h4 class="modal-title"><span class="glyphicon glyphicon-plus"> </span> Add category</h4>
  			      </div>

  			      <div class="modal-body">
  							<div class="container-fluid">
  								<div class="row">
  									<div class="col-md-8 col-md-offset-2">
  													<!-- Main Content -->
  					      		<br><caption><span class="glyphicon glyphicon-plus"> </span> Add category</caption><br><br>
  						      	<form name="sentMessage" id="contactForm" action="{{route('categories.store')}}" method="POST" data-parsley-validate>
  					            <div class="row control-group">
  					              <div class="form-group col-xs-12 floating-label-form-group controls">
  					                <label>Name</label>
  					                <input type="text" class="form-control" placeholder="category Name" id="name" name="name" required data-validation-required-message="Please enter the category name." maxlength="250" autofocus>
  					                <p class="help-block text-danger"></p>
  						            </div>
  						        	</div>	
  										  <input type="hidden" name="_token" value="{{csrf_token()}}">
  										  <br>
  										  <div id="success"></div>
  										  <div class="row">
  									      <div class="form-group col-xs-12">
  									        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-plus"> </span> Add category</button>
  									      </div>
  										  </div>
  										</form>
  					      	</div>
  					      </div>
  				      </div>
  	      		</div>

  			      <div class="modal-footer">
  			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  			      </div>

  			    </div>

  			  </div>
  			</div>
      @endif
		</div>
  @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
    <hr>
  @endif
  </div>
    <!-- /.box-header -->
    <div class="col-xs-12">
      <table width="100%" class="table table-striped table-bordered table-hover text-center" id="example1">
          <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>Actualites</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Options</th>
              </tr>
          </thead>
          <tbody>
          @foreach($categories as $category)
            <tr>
              <td class="fit">{{ $category -> id }}</td>
              <td class="fit"><a href="{{route('categories.show', $category->id)}}">{{ $category -> name }}</a></td>
              <td class="fit">{{$category->actualites->count()}}</td>
              <td>{{ date('d M Y', strtotime($category -> created_at)) }}</td>
              <td>{{ date('d M Y', strtotime($category -> updated_at)) }}</td>

              <td>
                <a href="{{route('categories.show', $category->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-eye-open"> </span> View</a>
              </td>
            </tr>
          @endforeach
          </tbody>
      </table>
      <!-- /.table-responsive -->


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
