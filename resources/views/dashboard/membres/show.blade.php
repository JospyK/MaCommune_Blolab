@extends("dash")
@section("pagetitle", " Voir Actualité")

@section("stylesheets")
@endsection

@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading',' $membre -> description')

@section("content")

<!-- Actualité Content -->
<article>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8"  style="margin-bottom: 20px;">
        <img src="{{'/images/membre_image/'.htmlspecialchars($membre->image)}}" class="img-responsive">
        <h1 class="fit">{{ $membre -> title }}</h1>
        <h3 class="fit">{{ $membre -> description }}</h3>
        <p class="fit">{!! $membre -> body !!}</p>

          <dl class="dl-horizontal fit col-md-6">
            <label>Nom : </label><br>
            <a href="">{{ $membre -> nom}}</a>
          </dl>

          <dl class="dl-horizontal fit col-md-6">
            <label>Prenom : </label><br>
            <a href="">{{ $membre -> prenom}}</a>
          </dl>

          <dl class="dl-horizontal fit col-md-6">
            <label>Contact : </label><br>
            <a href="">{{ $membre -> contact}}</a>
          </dl>

          <dl class="dl-horizontal fit col-md-6">
            <label>Fonction : </label><br>
            <a href="">{{ $membre -> function}}</a>
          </dl>

          <dl class="dl-horizontal fit col-xs-12">
            <label>Presentation : </label><br>
            <a href="">{{ $membre -> presentation}}</a>
          </dl>



        <hr>
      </div>

      <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">DETAILS</div>
        <div class="panel panel-body">


          <dl class="dl-horizontal fit">
            <label>Equipe : </label><br>
            <a href="">{{ $membre -> equipe -> name}}</a>
          </dl>

          <dl class="dl-horizontal">
            <p>
            <label>Created At :</label><br>
            {{ date('j M Y, H:i', strtotime($membre->created_at)) }}</p>
          </dl>
          
          <dl class="dl-horizontal">
            <p>
            <label>Last Updatate at :</label><br>
            {{ date( 'j M Y, H:i', strtotime($membre -> updated_at))}}</p>
          </dl>

          <hr>

          <div class="row">
              <div class="col-xs-12" style="margin-bottom: 10px;">
                <a href="{{route('membres.edit', $membre->id)}}" class="btn btn-info btn-block"><span class="glyphicon glyphicon-pencil"> </span> Modifier</a>
              </div>

            <div class="col-xs-12">
              <a href="{{route('membres.index')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-eye-open"> </span> Voir toutes les membres</a>
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