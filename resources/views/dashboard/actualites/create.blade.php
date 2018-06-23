@extends("dash")

@section("pagetitle", " Nouvelle Actualité")

@section('stylesheets')
  <link rel="stylesheet" type="text/css"  href="/css/parsley.css">
  <link rel="stylesheet" type="text/css"  href="/plugins/select2/select2.min.css">
@endsection

@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading','A Clean Bootstrap Blog')

@section('content')

  <!-- Main Content -->
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <form name="sentMessage" id="contactForm" action="{{route('actualites.store')}}" method="POST" data-parsley-validate enctype="multipart/form-data">
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Name</label>
                          <input type="text" class="form-control" placeholder="Title" id="title" name="title" required data-validation-required-message="Please enter the post title." maxlength="255" value="{{old('title')}}" autofocus>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Category</label>
                        <select class="form-control select2" name="category_id" required data-validation-required-message="Please select a category" data-placeholder="Please select a category">
                            <option value="" selected>Please select a category</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                      <label for="image">Image
                        <span id="fileicon" class="file glyphicon glyphicon-file"></span>
                      </label>
                        <input type="file" class="form-control" id="image" name="image" data-validation-required-message="Please select the post image.">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Body</label>
                          <textarea rows="7" class="form-control" placeholder="Body" id="body" name="body" data-validation-required-message="Please write the body.">{{old('body')}}</textarea>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <br>
                  <div id="success"></div>
                  <div class="row">
                      <div class="form-group col-xs-12">
                          <button type="submit" class="btn btn-default">Creer Actualité</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/parsley.min.js"></script>
  <script type="text/javascript" src="/plugins/select2/select2.full.min.js"></script>
  <script type="text/javascript" src="/js/tinymce/tinymce.min.js"></script>

  <script type="text/javascript">
    $(".select2").select2();
  </script>

  <script type="text/javascript">
  tinymce.init({
    selector: 'textarea#body',
    theme: 'modern',
    menubar: false,
    plugins: [
      'advlist autolink autoresize lists link image charmap print preview hr anchor pagebreak',
      'wordcount fullscreen fullpage',
      'save table contextmenu directionality',
      'emoticons template paste textcolor textpattern imagetools toc help'
    ],
    toolbar1: 'undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    toolbar2: 'fullpage print preview | forecolor backcolor emoticons | help',
    templates: [
      { title: 'Test template 1', content: 'Test 1' },
      { title: 'Test template 2', content: 'Test 2' }
    ]
 });
  </script>

@endsection 

