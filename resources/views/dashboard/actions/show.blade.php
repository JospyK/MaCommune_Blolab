@extends("dash")
@section("pagetitle", " Voir Action")

@section("stylesheets")
@endsection

@section('subheading',' $action -> description')

@section("content")

<!-- Action Content -->
<article>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8"  style="margin-bottom: 20px;">
        <img src="{{'/images/action_image/'.htmlspecialchars($action->image)}}" class="img-responsive">
        <h1 class="fit">{{ $action -> title }}</h1>
        <h3 class="fit">{{ $action -> description }}</h3>
        <hr>

          <dl class="col-lg-6 dl-horizontal">
            <p>
            <label>Start :</label><br>
            {{ date('j M Y, H:i', strtotime($action->start)) }}</p>
          </dl>

          <dl class="col-lg-6 dl-horizontal">
            <p>
            <label>End :</label><br>
            {{ date('j M Y, H:i', strtotime($action->end)) }}</p>
          </dl>


          <div>
            <div class="box-header">
              <h3 class="box-title col-xs-12">
                <span class="glyphicon glyphicon-comment"></span>
                {{ $action->comments->count() }}{{ ($action->comments->count()<=1)? " Comment": " Comments"}}
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="be-comment col-md-12">
                <table id="example1" class="table table-hover">
                  <thead>
                    <th>Nom</th>
                    <th>Comment</th>
                    <th>Created_at</th>
                  </thead>

                  <tbody>
                    @foreach ($action->comments as $comment)
                      <tr>
                        <td>{{$comment->userapp->nom}} {{$comment->userapp->prenom}}</td>
                        <td>{{$comment->commnent}}</td>
                        <td>{{ date('d M Y', strtotime($comment->created_at)) }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
      </div>

      <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">DETAILS</div>
        <div class="panel panel-body">

          <dl class="dl-horizontal fit">
            <label>Category : </label><br>
            <a href="">{{ $action -> action_category-> name}}</a>
          </dl>

          <dl class="dl-horizontal fit">
            <label>budget : </label><br>
            <a href="">{{ $action -> budget}}</a>
          </dl>

          <dl class="dl-horizontal fit">
            <label>Commune : </label><br>
            <a href="">{{ $action->commune->name}}</a>
          </dl>

          <dl class="dl-horizontal fit">
            <label>Author : </label><br>
            <a href="">{{ $action -> user -> first_name}}</a>
          </dl>

          <dl class="dl-horizontal">
            <p>
            <label>Created At :</label><br>
            {{ date('j M Y, H:i', strtotime($action->created_at)) }}</p>
          </dl>
          
          <dl class="dl-horizontal">
            <p>
            <label>Last Updatate at :</label><br>
            {{ date( 'j M Y, H:i', strtotime($action -> updated_at))}}</p>
          </dl>
          
          
          <hr>

          <div class="row">
            @if($action->user->id == Sentinel::getUser()->id)
              <div class="col-xs-12" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                  <a href="{{route('actions.edit', $action->id)}}" class="btn btn-info btn-block"><span class="glyphicon glyphicon-pencil"> </span> Modifier</a>
                </div>
                <div class="col-xs-6">
                  <a class="btn btn-danger btn-block" href="{{route('actions.destroy', $action->id)}}"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a> 
                </div>
              </div>
            @endif

            <div class="col-xs-12">
              <a href="{{route('actions.index')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-eye-open"> </span> Voir toutes les actions</a>
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