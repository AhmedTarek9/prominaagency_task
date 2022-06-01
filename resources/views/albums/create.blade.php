@include('layouts.header')
<br>
@if($errors->any())
<h4 class="alert alert-danger" role="alert">{{$errors->first()}}</h4>
@endif
<div class="container-fluid">
  <div class="d-flex justify-content-center">
<div class="form">
<form action="{{route('albums.store')}}" method="post">
      <div class="title"><p class="h2 d-flex justify-content-center">Create Album</p></div>
      <div class="subtitle">Let's create your Album!</div>
      <div class="input-container ic1">
        <input type="text" class="input" placeholder=" " / name="title">
        <div class="cut"></div>
        <label for="ALbum Name" class="placeholder">Album name</label>
      </div>
      <button type="sumbit" class="submit">submit</button>
      @csrf
  </form>
    </div>
  </div>
</div>