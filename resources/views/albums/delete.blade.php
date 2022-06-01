@include('layouts.header')
<div class="d-flex justify-content-center">
<form action="{{route('albums.move',$album->id)}}" method="post">
@csrf
@Method("POST")
You can move all picture to any album<br>
<select name='album'>
@foreach ($albums as $album)
<option value="{{$album->id}}">{{$album->title}}</option>
@endforeach
</select>
      <button type="sumbit" class="btn btn-warning">Move</button>
  </form>
  &nbsp &nbsp &nbsp
  <form action="{{route('albums.delete', $album->id) }}" method="POST">
                @csrf
                @method("DELETE")
            <button type="sumbit" action="{{route('albums.delete', $album->id) }}" class="btn btn-danger">Delete all picture</button>   
              </form>

</div>