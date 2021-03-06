@extends("dash")

@section("pagetitle", " $category->name categorie")

@section('stylesheets')
  <link rel="stylesheet" type="text/css"  href="/css/parsley.css">
  <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
@endsection

@section('content')

  <!-- Main Content -->

<div class="row">
<div class="col-xs-12">
  <div class="box">
    <div class="box-header">
        <!-- Main Content -->
      <div class="container-fluid">
        <div class="row">
          @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
          <div class="col-md-6">
            <h1 class=""><span class="glyphicon glyphicon-categories"> </span>  {{$category->name}} <small>{{$category->actualites->count()}} {{($category->actualites->count() <= 1)? ' Actualité' : ' Actualités'}}</small></h1>
          </div>
          <br>
            <div class="col-md-2">
              <button class="btn btn-default btn-block"  data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
            </div>
            <div class="col-md-2">
              <button class="btn btn-danger btn-block"  data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span> Delete</button>
            </div>
            <div class="col-md-2">
              <a class="btn btn-default btn-block" href="{{route('categories.index')}}" ><span class="glyphicon glyphicon-eye-open"> </span> All</a>
            </div>
          @elseif(Sentinel::getUser()->roles()->first()->slug == 'manager')
            <div class="col-md-8">
              <h1 class=""><span class="glyphicon glyphicon-categories"> </span>  {{$category->name}} category <small>{{$category->actualites->count()}} {{($category->actualites->count() <= 1)? ' Actualité' : ' Actualités'}}</small></h1>
            </div>
            <br>
            <div class="col-md-4">
              <a class="btn btn-default btn-block" href="{{route('categories.index')}}" ><span class="glyphicon glyphicon-eye-open"> </span> All</a>
            </div>
          @endif
        </div>
      <hr>
    </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example1" class="table table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Options</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($category->actualites as $actualite)
            <tr>
              <td>{{ $actualite->id}}</td>
              <td><a href="{{route('actualites.show', $actualite->id)}}">{{ $actualite->title }}</a></td>
              <td><a href="{{route('categories.show', $actualite -> category -> id)}}">{{ $actualite -> category -> name}}</a></td>
              <td>
                <a href="{{route('actualites.show', $actualite->id)}}" class="btn btn-default btn-xs" ><span class="glyphicon glyphicon-eye-open"></span> View</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>


  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit category</h4>
        </div>

        <div class="modal-body">
          <!-- Main Content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3>Please edit your category</h3>
                <form name="sentMessage" id="contactForm" action="{{route('categories.update', $category->id)}}" method="POST" data-parsley-validate>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  {{method_field("PUT")}}

                  <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                      <label>Name</label>
                      <input type="text" class="form-control" placeholder="category Name" id="name" name="name" value="{{$category->name}}" required data-validation-required-message="Please enter the category name." maxlength="250" autofocus>
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>  
                  <br>
                  <div id="success"></div>
                      <button type="submit" class="btn btn-default">Edit category</button>
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


<!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><span class="glyphicon glyphicon-trash"> </span> Delete</h4>
        </div>

        <div class="modal-body">
          <!-- category Content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <p>Name :    {{$category->name}} </p>

              <div class="col-xs-4">
                <button class="btn btn-default btn-block" data-toggle="modal" data-target="#edit" data-dismiss="modal"><span class="glyphicon glyphicon-pencil"> </span> Edit</button>
              </div>
              <div class="col-xs-4">
                <form name="sentMessage" id="contactForm" action="{{route('categories.destroy', $category->id)}}" method="post" data-parsley-validate>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  {{method_field("DELETE")}}
                  <button class="btn btn-danger btn-block" type="submit"><span class="glyphicon glyphicon-trash"> </span> Delete</button> 
                </form>
              </div>
              <div class="col-xs-4">
                <button type="button" class="btn btn-default btn-block" data-dismiss="modal">Close</button>
              </div>
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

</div>
@endsection

@section('scripts')
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
@endsection
