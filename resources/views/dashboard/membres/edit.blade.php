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
            <form name="sentMessage" id="contactForm" action="{{route('membres.update', $membre->id)}}" method="POST" data-parsley-validate enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                {{method_field("PUT")}}



                <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Nom</label>
                          <input type="text" class="form-control" placeholder="Nom" id="nom" name="nom" required data-validation-required-message="Please enter the post nom." maxlength="255" value="{{$membre->nom}}" autofocus>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Prenom</label>
                          <input type="text" class="form-control" placeholder="Nom" id="prenom" name="prenom" required data-validation-required-message="Please enter the post prenom." maxlength="255" value="{{$membre->prenom}}" >
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Contact</label>
                          <input type="text" class="form-control" placeholder="Contact" id="contact" name="contact" required data-validation-required-message="Please enter the post contact." maxlength="255" value="{{$membre->contact}}" >
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Fonction</label>
                          <input type="text" class="form-control" placeholder="Fonction" id="fonction" name="fonction" required data-validation-required-message="Please enter the post fonction." maxlength="255" value="{{$membre->fonction}}" >
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Equipes</label>
                        <select class="form-control" name="equipe_id" required data-validation-required-message="Please select a equipe">
                          @foreach($equipes as $equipe)
                            <option value="{{$equipe->id}}" {{ ($equipe->id == $membre->equipe->id ) ? 'selected' : '' }}>{{$equipe->name}}</option>
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
                        <input type="file" class="form-control" id="image" name="image" data-validation-required-message="Please select the post image.">
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Presentation</label>
                          <textarea rows="7" class="form-control" placeholder="Presentation" id="presentation" name="presentation" data-validation-required-message="Please write the presentation.">{{$membre->presentation}}</textarea>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>


                <div id="success"></div>
                <div class="row">
                    <div class="col-xs-6">
                      <a href="{{route('membres.show', $membre->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Cancel</a>
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