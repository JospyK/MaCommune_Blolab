@extends("dash")

@section("pagetitle", " Nouvelle Action")

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
              <form name="sentMessage" id="contactForm" action="{{route('actions.store')}}" method="POST" data-parsley-validate>
                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Titre</label>
                          <input type="text" class="form-control" placeholder="Title" id="title" name="title" required data-validation-required-message="Please enter the post title." maxlength="255" value="{{old('title')}}" autofocus>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>
                  

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Localisation</label>
                          <input type="text" class="form-control" placeholder="Localisation" id="localisation" name="localisation" required data-validation-required-message="Please enter the post localisation." maxlength="255" value="" autofocus>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Budget</label>
                          <input type="number" class="form-control" placeholder="budget" id="budget" name="budget" required data-validation-required-message="Please enter the post budget." maxlength="255" value="{{old('budget')}}">
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-lg-6 floating-label-form-group controls">
                        <label>Debute le</label>
                        <input type="date" class="form-control" placeholder="Debute le" id="start" name="start" required data-validation-required-message="Please enter the post start." maxlength="255" value="{{old('start')}}">
                      </div>
                      <div class="form-group col-lg-6 floating-label-form-group controls">
                        <label>Fini le</label>
                        <input type="date" class="form-control" placeholder="Fini le" id="end" name="end" required data-validation-required-message="Please enter the post end." maxlength="255" value="{{old('end')}}">
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Category</label>
                        <select class="form-control select2" name="action_category_id" required data-validation-required-message="Please select a category" data-placeholder="Please select a category">
                            <option value="" selected>Please select a category</option>
                          @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>Source de financement</label>
                          <textarea rows="2" max="300" class="form-control" placeholder="Source de Finacement" id="sourcefinancement" name="sourcefinancement" data-validation-required-message="Entrer la source de finacement.">{{old('source_financement')}}</textarea>
                          <p class="help-block text-danger"></p>
                      </div>
                  </div>

                  <div class="form-group">
                  <label for="image" class="control-label col-md-3">Image</label>
                      <div class="col-md-9">
                          <input type="file" class="form-control col-md-9" id="image" name="image" data-validation-required-message="Please select the post image.">
                      </div>
                  </div>

                  <div class="row control-group">
                      <div class="form-group col-xs-12 floating-label-form-group controls">
                          <label>description</label>
                          <textarea rows="8" class="form-control" placeholder="description" id="description" name="description" data-validation-required-message="Please write the description.">{{old('description')}}</textarea>
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

