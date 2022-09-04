
@extends('layouts.app')

@section('content')
<h1>@yield('header')</h1>
<form action="@yield('form_action')" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4">
        <label for="image">Image de la comp&eacute;tence</label>
        <input type="file" class="form-control" name="image" id="hero_image_path" />
        @if ($project->image_path)
            <img src="{{asset('storage/' . $project->image_path)}}" class="img-thumbnail" alt="" srcset="">
        @endif
    </div>
    <div class="form-group mb-4">
        <label for="title">Titre</label>
        <input type="text" value="{{$project->title}}" class="form-control" name="title" id="linkedin_badge" placeholder="Titre">
    </div>
    <div class="form-group mb-4">
        <label for="description">Description</label>
        
        <textarea class="summernote" name="description" id="description">{{$project->description}}</textarea>
    </div>
    <div class="form-group mb-4">
        <label for="technologies">Technologies</label>
        <input type="text" value="{{$project->technologies}}" class="form-control" name="technologies" step="any" id="linkedin_badge" placeholder="Technologies">
    </div>
    <button type="submit" class="btn btn-primary">@yield('button_form_text')</button>
</form>

@endsection