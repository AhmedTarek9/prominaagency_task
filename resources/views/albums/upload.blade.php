@include('layouts.header')
@if($errors->any())
<h4 class="alert alert-danger justify-content-center" role="alert">{{$errors->first()}}</h4>
@endif
<br>
<div class="d-flex justify-content-center">
<br>
  <div class="d-flex">
<div class="form">
<form action="{{route('albums.upload',$album->id)}}" method="post" enctype="multipart/form-data">
@csrf
@Method("POST")
      <div class="title"><p class="h2 d-flex justify-content-center">Add Photo</p></div>
      <div class="subtitle">Let's add image to your Album!</div>
      <div class="input-container ic1">
      <input type="File" id="image" name="image" >
        <div class="cut"></div>
      </div>
      <div class="input-container ic1">
      <input type="text" class="input" placeholder=" " / name="title">
        <div class="cut"></div>
        <label for="image Name" class="placeholder">image name</label>
      </div>
      <button type="sumbit" class="submit">submit</button>
  </form>
    </div>
  </div>
</div>
<div class="container-fluid">
<div class="md-6">
<p class="h2">{{$album->title;}} ALbum  Photos</p>
<br>
<div class="container justify-center">
  <div class="row">
  @foreach($photos as $photo)
  &nbsp
  <div class="column">
      <image src="{{$photo->getUrl()}}">
        name of picture :{{$photo->name}}
    </div>
    @endforeach
  </div>
</div>
</div>
</div>