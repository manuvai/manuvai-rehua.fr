
@extends('layouts.app')

@section('content')
<h1>@yield('header')</h1>
<form action="@yield('form_action')" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group mb-4">
        <label for="name">Titre</label>
        <input type="text" value="{{$cursus->name}}" class="form-control" name="name" id="name" placeholder="Titre">
        @error('name')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="company">Entreprise / Établissement</label>
        <input type="text" value="{{$cursus->company}}" class="form-control" name="company" id="company" placeholder="Entreprise / Établissement">
        @error('company')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="place">Lieu de l'expérience</label>
        <input type="text" value="{{$cursus->place}}" class="form-control" name="place" id="place" placeholder="Lieu de l'expérience">
        @error('place')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="start_date">Date de début</label>
        <input type="date" value="{{$cursus->start_date}}" class="form-control" name="start_date" id="start_date" placeholder="Date de début">
        @error('start_date')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="end_date">Date de fin</label>
        <input type="date" value="{{$cursus->end_date}}" class="form-control" name="end_date" id="end_date" placeholder="Date de fin">
        @error('end_date')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="description">Description</label>
        
        <textarea class="summernote" name="description" id="description">{{$cursus->description}}</textarea>
        @error('description')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <div class="form-group mb-4">
        <label for="type">Type d'expérience</label>
        <select class="form-control" id="type" name="type">
            <option value="job">Emploi</option>
            <option value="school">Cursus scolaire</option>
            <option value="internship">Stage</option>
        </select>
        
        @error('type')
            <div class="alert alert-danger">{{$message}}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">@yield('button_form_text')</button>
</form>

@endsection