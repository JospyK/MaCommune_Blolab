@extends("dash")
@section("pagetitle", " Supprimer Actualité")

@section("stylesheets")
@endsection

@section('bgimg', 'background-image: url("/img/home-bg.jpg")')
@section('subheading',' ')

@section("content")

<!-- Actualité Content -->
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <p>Name :    {{$actualite->name}} </p>
      <p>Email :   {{$actualite->email}}</p>
      <p>post : {{$actualite->commnent}}</p>

    <div class="col-xs-4">
      <a class="btn btn-primary btn-block" href="{{route('actualites.edit', $actualite->id)}}"><span class="glyphicon glyphicon-trash"> </span> Edit</a> 
    </div>
    <div class="col-xs-4">
      <form name"sentMessage" id="contactForm" action="{{route('actualites.destroy', $actualite->id)}}" method="post" data-parsley-validate>
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        {{method_field("DELETE")}}
        <button class="btn btn-danger btn-block" type="submit"><span class="glyphicon glyphicon-trash"> </span> Supprimer</button>
      </form>
    </div>
    <div class="col-xs-4">
      <a class="btn btn-primary btn-block" href="{{route('actualites.show', $actualite->id)}}"><span class="glyphicon glyphicon-trash"> </span> Cancel</a> 
    </div>
    </div>
  </div>
</div>
@endsection

@section("scripts")
@endsection