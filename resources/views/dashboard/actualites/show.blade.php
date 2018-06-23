@extends("dash")
@section("pagetitle", " Voir Actualité")

@section("stylesheets")
@endsection

@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading',' $actualite -> description')

@section("content")

<!-- Actualité Content -->
<article>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8"  style="margin-bottom: 20px;">
        <img src="{{'/images/actualite_image/'.htmlspecialchars($actualite->image)}}" class="img-responsive">
        <h1 class="fit">{{ $actualite -> title }}</h1>
        <h3 class="fit">{{ $actualite -> description }}</h3>
        <p class="fit">{!! $actualite -> body !!}</p>
        <hr>
      </div>

      <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">DETAILS</div>
        <div class="panel panel-body">

          <dl class="dl-horizontal fit">
            <label>Category : </label><br>
            <a href="{{route('categories.show',  $actualite->category->id)}}">{{ $actualite -> category -> name}}</a>
          </dl>

          <dl class="dl-horizontal fit">
            <label>Author : </label><br>
            <a href="">{{ $actualite -> user -> first_name}}</a>
          </dl>

          <dl class="dl-horizontal">
            <p>
            <label>Created At :</label><br>
            {{ date('j M Y, H:i', strtotime($actualite->created_at)) }}</p>
          </dl>
          
          <dl class="dl-horizontal">
            <p>
            <label>Last Updatate at :</label><br>
            {{ date( 'j M Y, H:i', strtotime($actualite -> updated_at))}}</p>
          </dl>

          <hr>

          <div class="row">
            @if($actualite->user->id == Sentinel::getUser()->id)
              <div class="col-xs-12" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                  <a href="{{route('actualites.edit', $actualite->id)}}" class="btn btn-info btn-block"><span class="glyphicon glyphicon-pencil"> </span> Modifier</a>
                </div>
                <div class="col-xs-6">
                  <a class="btn btn-danger btn-block" href="{{route('actualites.destroy', $actualite->id)}}"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a> 
                </div>
              </div>
            @endif

            <div class="col-xs-12">
              <a href="{{route('actualites.index')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-eye-open"> </span> Voir toutes les actualités</a>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>
</article>

@endsection

@section("scripts")

@endsection