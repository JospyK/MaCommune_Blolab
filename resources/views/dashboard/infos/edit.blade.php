@extends("dash")

@section("pagetitle", " Modifier Info")

@section('stylesheets')
  <link rel="stylesheet" type="text/css"  href="/css/parsley.css">
  <link rel="stylesheet" type="text/css"  href="/css/select2.css">
@endsection

@section('content')

<!-- Action Content -->
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <form name="sentMessage" id="contactForm" action="{{route('infos.update', $info->id)}}" method="POST" data-parsley-validate enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{method_field("PUT")}}
                <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Non</label>
                          <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required data-validation-required-message="Please enter the post nom." maxlength="255" value="{{$info->nom}}" autofocus>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Contact</label>
                          <input type="number" class="form-control" placeholder="contact" id="contact" name="contact" required data-validation-required-message="Please enter the post contact." maxlength="255" value="{{$info->contact}}">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <br>
                  <div id="success"></div>
                  <div class="row">
                      <div class="form-group col-xs-12">
                          <button type="submit" class="btn btn-default pull-right">Modifier Action</button>
                          <button type="button" class="btn btn-danger pull-left">Annuler</button>
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
@endsection 