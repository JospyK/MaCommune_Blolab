@extends("dash")

@section("pagetitle", " Modifier Session")

@section('stylesheets')
  <link rel="stylesheet" type="text/css"  href="/css/parsley.css">
  <link rel="stylesheet" type="text/css"  href="/css/select2.css">
@endsection

@section('content')

<!-- Session Content -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form name="sentMessage" id="contactForm" action="{{route('sessions.update', $session->id)}}" method="POST" data-parsley-validate enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{method_field("PUT")}}
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Title" id="title" name="title" required data-validation-required-message="Please enter the session title." maxlength="255" value="{{$session->title}}" autofocus>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                  <div class="form-group">
                      <label for="file" class="control-label col-md-2">File</label>
                      <div class="col-md-9">
                          <input type="file" class="form-control col-md-10" id="file" name="file" data-validation-required-message="Please select the file.">
                      </div>
                  </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Body</label>
                        <textarea rows="7" class="form-control" placeholder="Body" id="body" name="body" data-validation-required-message="Please write the body.">{!!$session->body!!}</textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                </div>


                <br>

                <div id="success"></div>
                <div class="row">
                    <div class="col-xs-6">
                      <a href="{{route('sessions.show', $session->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Cancel</a>
                    </div>
                    <div class="form-group col-xs-6">
                        <button type="submit" class="btn btn-default pull-right">Modifier Session</button>
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