
@extends('layouts.app')

@section('content')
<h1>@yield('header')</h1>
<form action="@yield('form_action')" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4">
        <label for="image">Image de la comp&eacute;tence</label>
        <input type="file" class="form-control" name="image" id="hero_image_path" />
        @if ($skill->image)
            <img src="{{asset('storage/' . $skill->image)}}" class="img-thumbnail" alt="" srcset="">
        @endif
    </div>
    <div class="form-group mb-4">
        <label for="title">Titre</label>
        <input type="text" value="{{$skill->title}}" class="form-control" name="title" id="linkedin_badge" placeholder="Titre">
    </div>
    <div class="form-group mb-4">
        <label for="rate">Note</label>
        <input type="number" value="{{$skill->rate}}" class="form-control" name="rate" step="any" id="linkedin_badge" placeholder="Note">
    </div>
    <button type="submit" class="btn btn-primary">@yield('button_form_text')</button>
</form>

@endsection