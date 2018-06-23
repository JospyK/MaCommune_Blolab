@extends("dash")
@section("pagetitle", " Voir Signalement")

@section("stylesheets")
@endsection

@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading',' $signalement -> description')

@section("content")

<!-- Signalement Content -->
<article>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8"  style="margin-bottom: 20px;">
        <img src="{{'/image/signalement_image/'.htmlspecialchars($signalement->image)}}" class="img-responsive">
        <h1 class="fit">{{ $signalement -> title }}</h1>
        <h3 class="fit">{{ $signalement -> description }}</h3>
        <p class="fit">{!! $signalement -> body !!}</p>
        <hr>
      </div>

      <div class="col-md-4">
        <div class="panel panel-primary">
        <div class="panel-heading">DETAILS</div>
        <div class="panel panel-body">

          <dl class="dl-horizontal fit">
            <label>Category : </label><br>
            <a href="{{route('categories.show',  $signalement->category->id)}}">{{ $signalement -> category -> name}}</a>
          </dl>

          <dl class="dl-horizontal fit">
            <label>Author : </label><br>
            <a href="">{{ $signalement -> user -> first_name}}</a>
          </dl>

          <dl class="dl-horizontal">
            <p>
            <label>Created At :</label><br>
            {{ date('j M Y, H:i', strtotime($signalement->created_at)) }}</p>
          </dl>
          
          <dl class="dl-horizontal">
            <p>
            <label>Last Updatate at :</label><br>
            {{ date( 'j M Y, H:i', strtotime($signalement -> updated_at))}}</p>
          </dl>
          
          <hr>

          <dl class="dl-horizontal fit">
            <div class="row">
              <div class="col-xs-7">
                <label>Statut : </label>
                <span class="label label-{{$signalement -> statut}}">
                  {{  ($signalement->statut == 'success') ? 'Accepté'            : '' }}
                  {{  ($signalement->statut == 'danger' ) ? 'Refusé'             : '' }}
                  {{  ($signalement->statut == 'info'   ) ? 'En attente dedition': '' }}
                  {{  ($signalement->statut == 'warning') ? 'Pending'            : '' }}
                </span>
              </div>

              @if(Sentinel::getUser()->roles()->first()->slug == 'admin')
                <div class="col-xs-5">
                  <button class="btn btn-info btn-block" data-toggle="modal" data-target="#statutmenu"><span class="glyphicon glyphicon-pencil"> </span> Change</button>
                </div>
              @endif
              <br>
            </div>
              <br>
            <div class="row">
              <div class="col-xs-12">
                <div class="callout callout-{{$signalement -> statut}}">
                  <p>{{$signalement -> edit_message}}</p>
                </div>
              </div>
            </div>
          </dl>
          
          <hr>

          <div class="row">
            @if($signalement->user->id == Sentinel::getUser()->id)
              <div class="col-xs-12" style="margin-bottom: 10px;">
                <div class="col-xs-6">
                  <a href="{{route('signalements.edit', $signalement->id)}}" class="btn btn-info btn-block"><span class="glyphicon glyphicon-pencil"> </span> Modifier</a>
                </div>
                <div class="col-xs-6">
                  <a class="btn btn-danger btn-block" href="{{route('signalements.destroy', $signalement->id)}}"><span class="glyphicon glyphicon-trash"> </span> Supprimer</a> 
                </div>
              </div>
            @endif

            <div class="col-xs-12">
              <a href="{{route('signalements.index')}}" class="btn btn-primary btn-block"><span class="glyphicon glyphicon-eye-open"> </span> Voir toutes les actualités</a>
            </div>
          </div>
        </div>

        </div>
      </div>
    </div>
  </div>


@if(Sentinel::getUser()->roles()->first()->slug == 'admin')
  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div id="statutmenu" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Statut Menu</h4>
        </div>

        <div class="modal-body">
          <!-- Main Content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3>Please set the post state</h3>
                <div class="row">
                  <div class="col-xs-4">
                    <form name"sentMessage" id="contactForm" action="{{route('signalements.accept', $signalement->id)}}" method="post" data-parsley-validate>
                      <input type="hidden" name="_token" value="{{csrf_token()}}">
                      {{method_field("POST")}}
                      <button class="btn btn-success btn-block" type="submit"><span class="glyphicon glyphicon-ok"> </span> Allow</button> 
                    </form>
                  </div>

                  <div class="col-xs-4">
                    <button class="btn btn-info btn-block" data-toggle="modal" data-target="#edit" data-dismiss="modal"><span class="glyphicon glyphicon-pencil"> </span> edit msg</button>
                  </div>

                  <div class="col-xs-4">
                    <button class="btn btn-danger btn-block" data-toggle="modal" data-target="#refuse" data-dismiss="modal"><span class="glyphicon glyphicon-pencil"> </span> Refuse</button>
                  </div>

                </div>
              </div>
            </div>
          </div>  
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>

    </div>
  </div>


  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Edit Request</h4>
        </div>

        <div class="modal-body">
          <!-- Main Content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3>Please add the message</h3>
                <form name="sentMessage" id="contactForm" action="{{route('signalements.askEdit', $signalement->id)}}" method="POST" data-parsley-validate>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  {{method_field("POST")}}

                  <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                      <label>Description</label>
                      <textarea rows="5" class="form-control" placeholder="Description" id="description" name="description" required data-validation-required-message="Please write a short description."></textarea>
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>

                  <br>
                  <div id="success"></div>
                    <button type="submit" class="btn btn-default">Send Edit Request</button>
                </form>
              </div>
            </div>
          </div>  
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>

    </div>
  </div>


  <!-- Trigger the modal with a button -->
  <!-- Modal -->
  <div id="refuse" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Refuse Signalement</h4>
        </div>

        <div class="modal-body">
          <!-- Main Content -->
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h3>Please add the message</h3>
                <form name="sentMessage" id="contactForm" action="{{route('signalements.refuse', $signalement->id)}}" method="POST" data-parsley-validate>
                  <input type="hidden" name="_token" value="{{csrf_token()}}">
                  {{method_field("POST")}}

                  <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                      <label>Tell us why your refuse the post</label>
                      <textarea rows="5" class="form-control" placeholder="Tell us why your refuse the post" id="raisons" name="raisons" required data-validation-required-message="Please write a short description."></textarea>
                      <p class="help-block text-danger"></p>
                    </div>
                  </div>

                  <br>
                  <div id="success"></div>
                      <button type="submit" class="btn btn-default">Validate</button>
                </form>
              </div>
            </div>
          </div>  
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>

      </div>

    </div>
  </div>
  @endif

</article>

@endsection

@section("scripts")

@endsection