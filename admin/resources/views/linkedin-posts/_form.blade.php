
@extends('layouts.app')

@section('content')
<h1>@yield('header')</h1>
<form action="@yield('form_action')" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4">
        <label for="title">Titre</label>
        <input type="text" value="{{$linkedinPost->title}}" class="form-control" name="title" id="linkedin_badge" placeholder="Titre">
    </div>
    <div class="form-group mb-4">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" id="linkedin_badge" placeholder="Description">{{$linkedinPost->description}}</textarea>
    </div>
    <div class="form-group mb-4">
        <label for="state">Statut de la publication</label>
        <select name="state" class="form-control" id="state">
            <option value="draft" {{(($linkedinPost->state == 'draft') ? 'selected' : '')}}>Brouillon</option>
            <option value="ready" {{(($linkedinPost->state == 'ready') ? 'selected' : '')}}>Prêt</option>
            <option value="published" {{(($linkedinPost->state == 'published') ? 'selected' : '')}}>Publiée</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">@yield('button_form_text')</button>
</form>
@if ($linkedinPost->id)
    @include('linkedin-posts.media.part')
@endif

@endsection
