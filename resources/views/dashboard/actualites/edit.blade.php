@extends("dash")

@section("pagetitle", " Modifier Actualité")

@section('stylesheets')
  <link rel="stylesheet" type="text/css"  href="/css/parsley.css">
  <link rel="stylesheet" type="text/css"  href="/css/select2.css">
  <style type="text/css">
    #change-image{
      position: relative;
      top: -50px;
      left: -30px;
      z-index: 1;
    }
  </style>
@endsection

@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading','A Clean Bootstrap Blog')

@section('content')

<!-- Actualité Content -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form name="sentMessage" id="contactForm" action="{{route('actualites.update', $actualite->id)}}" method="POST" data-parsley-validate enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{method_field("PUT")}}
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" required data-validation-required-message="Please enter the actualite title." maxlength="255" value="{{$actualite->title}}" autofocus>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                      <label>Categories</label>
                      <select class="form-control" name="category_id" required data-validation-required-message="Please select a category">
                        @foreach($categories as $category)
                          <option value="{{$category->id}}" {{ ($category->id == $actualite->category->id ) ? 'selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                      </select>
                      <p class="help-block text-danger"></p>
                  </div>
                </div>

                <div class="row control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label for="image">Image
                      <span id="fileicon" class="file glyphicon glyphicon-file"></span>
                    </label>
                      <input type="file" class="form-control" id="image" name="image" data-validation-required-message="Please select the actualite image.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Body</label>
                        <textarea rows="7" class="form-control" placeholder="Body" id="body" name="body" data-validation-required-message="Please write the body.">{{$actualite->body}}</textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="col-xs-6">
                      <a href="{{route('actualites.show', $actualite->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Cancel</a>
                    </div>
                    <div class="form-group col-xs-6">
                        <button type="submit" class="btn btn-default pull-right">Modifier Actualité</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/parsley.min.js"></script>
  <script type="text/javascript" src="/js/select2.js"></script>
  <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>

  <script type="text/javascript">
    $(".js-example-basic-multiple").select2();
  </script>

  <script type="text/javascript">
    tinymce.init({
      selector: 'textarea#body',
      plugins: 'link',
      menubar: false
    });
  </script>
@endsection 