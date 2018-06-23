@extends("dash")

@section("pagetitle", " Infos")

@section('stylesheets')
  <link rel="stylesheet" type="text/css"  href="/css/parsley.css">
  <link rel="stylesheet" type="text/css"  href="/plugins/select2/select2.min.css">
@endsection

@section('content')

  <!-- Main Content -->
  <div class="container-fluid">
      <div class="row">
          <div class="col-md-10 col-md-offset-1">
              <form name="sentMessage" id="contactForm" action="{{route('infos.store')}}" method="POST" data-parsley-validate>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Nom</label>
                          <input type="text" class="form-control" placeholder="Nom de l'entité" id="nom" name="nom" required data-validation-required-message="Please enter the post nom." maxlength="255" value="{{old('nom')}}" autofocus>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Contact</label>
                          <input type="number" class="form-control" placeholder="contact" id="contact" name="contact" required data-validation-required-message="Please enter the post contact." maxlength="255" value="{{old('contact')}}">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  <br>
                  <div id="success"></div>
                  <div class="row">
                      <div class="form-group col-xs-12">
                          <button type="submit" class="btn btn-default">Creer Action</button>
                      </div>
                  </div>
              </form>
          </div>
      </div>
  </div>
@endsection

@section('scripts')
  <script type="text/javascript" src="/js/parsley.min.js"></script>
@endsection 

