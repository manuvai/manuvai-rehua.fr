@extends('layouts.app')

@section('content')
<a href="{{route('projects.create')}}" class="btn btn-primary">Ajouter</a>
@foreach(App\Models\Project::all() as $project)
    <!-- Blog Post -->
    <div class="card mb-4" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('storage/' . $project->img_path)}}" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$project->title}}</h2>
            <p class="card-text">{!!$project->description!!}</p>
        </div>
        <div class="card-footer text-muted">
            <form action="{{route('projects.destroy', $project->id)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
            <a href="{{route('projects.edit', $project->id)}}" class="btn btn-primary">Modifier</a>
            Créé le {{$project->created_at->format('d/m/Y')}}
        </div>
    </div>
@endforeach
@endsection
