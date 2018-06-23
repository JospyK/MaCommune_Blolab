@extends("dash")
@section("pagetitle", " Voir Session")

@section("stylesheets")
@endsection

@section("content")

<!-- Session Content -->
<article>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8"  style="margin-bottom: 20px;">
        <h1 class="fit">{{ $session -> title }}</h1>
        <p class="fit">{{ $session -> body }}</p>
        @if($session->file)
          <p class="fit">Vous pouvez aussi telecharger un rapport complet <a href="/files/session_file/{{$session->file}}">ici</a></p>
        @endif
        <hr>
      </div>

      <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">DETAILS</div>
        <div class="panel panel-body">

          <dl class="dl-horizontal fit">
            <label>Author : </label><br>
            <a href="">{{ $session -> user -> first_name}}</a>
          </dl>

          <dl class="dl-horizontal fit">
            <label>Commune : </label><br>
            <a href="">{{ $session -> commune -> name}}</a>
          </dl>

          <dl class="dl-horizontal">
            <p>
            <label>Created At :</label><br>
            {{ date('j M Y, H:i', strtotime($session->created_at)) }}</p>
          </dl>
          
          <dl class="dl-horizontal">
            <p>
            <label>Last Updatate at :</label><br>
            {{ date( 'j M Y, H:i', strtotime($session -> updated_at))}}</p>
          </dl>
          
          <hr>

          <div class="row">
            @if($session->user->id == Sentinel::getUser()->id)
              <div class="col-xs-12" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                  <a href="{{route('sessions.edit', $session->id)}}" class="btn btn-info btn-block"><span class="glyphicon glyphicon-pencil"> </span> Modifier</a>
                </div>
                <div class="col-xs-6">
                  <a class="btn btn-danger btn-block" href="{{route('sessions.destroy', $session->id)}}"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a> 
                </div>
              </div>
            @endif

            <div class="col-xs-12">
              <a href="{{route('sessions.index')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-eye-open"> </span> Voir toutes les actualités</a>
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