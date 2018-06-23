@extends("dash")
@section("pagetitle", " Voir Info")

@section("stylesheets")
@endsection

@section("content")

<!-- Info Content -->
<article>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8"  style="margin-bottom: 20px;">
        <h1 class="fit">{{ $info -> title }}</h1>
    
          <dl class="dl-horizontal fit col-md-6">
            <label>Nom : </label><br>
            <a href="{{route('categories.show',  $info->contact)}}">{{ $info -> nom}}</a>
          </dl>

          <dl class="dl-horizontal fit col-md-6">
            <label>contact : </label><br>
            <a href="{{route('categories.show',  $info->contact)}}">{{ $info -> contact}}</a>
          </dl>
      </div>

      <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">DETAILS</div>
        <div class="panel panel-body">

          <dl class="dl-horizontal fit">
            <label>Author : </label><br>
            <a href="">{{ $info -> user -> first_name}}</a>
          </dl>

          <dl class="dl-horizontal">
            <p>
            <label>Created At :</label><br>
            {{ date('j M Y, H:i', strtotime($info->created_at)) }}</p>
          </dl>
          
          <dl class="dl-horizontal">
            <p>
            <label>Last Updatate at :</label><br>
            {{ date( 'j M Y, H:i', strtotime($info -> updated_at))}}</p>
          </dl>
          
          
          <hr>

          <div class="row">
            @if($info->user->id == Sentinel::getUser()->id)
              <div class="col-xs-12" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                  <a href="{{route('infos.edit', $info->id)}}" class="btn btn-info btn-block"><span class="glyphicon glyphicon-pencil"> </span> Modifier</a>
                </div>
                <div class="col-xs-6">
                  <a class="btn btn-danger btn-block" href="{{route('infos.destroy', $info->id)}}"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a> 
                </div>
              </div>
            @endif

            <div class="col-xs-12">
              <a href="{{route('infos.index')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-eye-open"> </span> Voir toutes les infos</a>
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